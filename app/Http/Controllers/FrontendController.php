<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Blog;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Models\AboutUs;
use App\Models\Department;
use App\Models\Contact;
use App\Models\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();

        $allNews = News::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $Blogs = Blog::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $universities = University::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontendpanel.home.index', compact('Blogs', 'universities', 'aboutUs', 'allNews'));
    }

    public function about()
    {
        return view('frontendpanel.about.about');
    }

    public function contact()
    {
        return view('frontendpanel.contact.contact');
    }

    public function blog()
    {

        $blogs = Blog::with('images', 'comments')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $categories_name = Category::pluck('name', 'id'); // Fetch categories as an associative array
        $users = User::pluck('name', 'id');
        $categories = Category::all();
        return view('frontendpanel.blog.blog', compact('blogs', 'categories', 'categories_name', 'users'));
    }

    public function categorywise_blog($id)
    {
        $blogs = Blog::with('images', 'comments')
            ->where('status', 1)
            ->where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $categories_name = Category::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $categories = Category::all();
        return view('frontendpanel.blog.blog', compact('blogs', 'categories', 'categories_name', 'users'));
    }

    public function blog_search(Request $request)
    {
        $query = $request->input('query');

        $blogs = Blog::with('images', 'comments')->where('title', 'LIKE', "%$query%")
            ->orWhere('content', 'LIKE', "%$query%")
            ->orWhere('tag', 'LIKE', "%$query%")
            ->orderby('created_at', 'desc')
            ->where('status', 1)
            ->get();

        $categories_name = Category::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $categories = Category::all();

        return view('frontendpanel.blog.blog', compact('blogs', 'categories', 'categories_name', 'users'));
    }

    public function blogDetails($id)
    {

        $blog = Blog::with('images', 'comments.replies')->findOrFail($id);
        $tags = explode(',', $blog->tag);
        $categories = Category::all();
        $recentBlogs = Blog::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $relatedBlogs = Blog::with('images')
            ->where('category_id', $blog->category_id)
            ->where('status', 1)
            ->where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontendpanel.blog.blog-details', compact('blog', 'tags', 'categories', 'recentBlogs', 'relatedBlogs'));
    }



    public function likeBlog($id)
    {
        // Find the blog post by ID
        $blog = Blog::find($id);

        if ($blog) {
            // Get the currently authenticated user
            $user = auth()->user();

            // Check if the user has already liked the blog post
            $hasLiked = $user->likedBlogs->contains($blog->id);

            if ($hasLiked) {
                // User has already liked the blog post, so they want to unlike it
                // Decrease the likes count for the blog post
                $blog->decrement('likes');

                // Remove the like relationship
                $user->likedBlogs()->detach($blog);

                return redirect()->back()->with('success', 'You unliked the blog post.');
            } else {
                // User hasn't liked the blog post, so they want to like it
                // Increment the likes count for the blog post
                $blog->increment('likes');

                // Create the like relationship
                $user->likedBlogs()->attach($blog);

                return redirect()->back()->with('success', 'You liked the blog post.');
            }
        }

        return redirect()->back()->with('error', 'Blog post not found.');
    }


    public function blog_tag($tag)
    {
        $blogs = Blog::with('images', 'comments')->where('tag', 'LIKE', "%$tag%")
            ->orderby('created_at', 'desc')
            ->where('status', 1)
            ->get();

        $categories_name = Category::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $categories = Category::all();

        return view('frontendpanel.blog.blog', compact('blogs', 'categories', 'categories_name', 'users'));
    }






    public function news()
    {
        $allNews = News::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontendpanel.news.news', compact('allNews'));
    }

    public function news_search(Request $request)
    {
        $query = $request->input('query');

        $allNews = News::where('title', 'LIKE', "%$query%")
            ->orWhere('content', 'LIKE', "%$query%")
            ->orWhere('categories', 'LIKE', "%$query%")
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->with('images')
            ->get();

        return view('frontendpanel.news.news', compact('allNews'));
    }

    public function categorywise_news($name)
    {
        $allNews = News::with('images')
            ->where('status', 1)
            ->where('categories', $name)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontendpanel.news.news', compact('allNews'));
    }

    public function newsDetails($id)
    {
        $news = News::with('images')->findOrFail($id);

        $categories = News::where('status', 1)
            ->distinct('categories')
            ->pluck('categories');

        $recentNews = News::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $relatedNews = News::with('images')
            ->where('status', 1)
            ->where('categories', $news->categories)
            ->where('id', '!=', $news->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontendpanel.news.news-details', compact('news', 'categories', 'recentNews', 'relatedNews'));
    }

    public function university()
    {
        $universities = University::with('images')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontendpanel.university.university', compact('universities'));
    }

    public function university_search(Request $request)
    {
        $query = $request->input('query');

        $universities = University::where('name', 'LIKE', "%$query%")
            ->orWhere('address', 'LIKE', "%$query%")
            ->get();

        return view('frontendpanel.University.university', compact('universities'));
    }

    public function universityDetails($id)
    {
        $university = University::with('images')->findOrFail($id);
        $departmentIds = json_decode($university->department_id);

        // Fetch the associated departments using the IDs
        $departments = Department::whereIn('id', $departmentIds)->where('status', 1)->get();

        return view('frontendpanel.University.university-details', compact('university', 'departments'));
    }


    public function nearest_university_search()
    {
        // $universities = University::where('status', 1)
        //     ->orderBy('created_at', 'desc')
        //     ->get(['id','name','email', 'contact' ,'address','latitude','longitude']);
        return view('frontendpanel.university.nearest-university');
    }


    public function getUniversitiesGeoJSON()
    {
        $universities = DB::table('universities')->select('name', 'short_description', 'website', 'longitude', 'latitude')->get();

        $features = [];
        foreach ($universities as $university) {
            $feature = [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [(float)$university->longitude, (float)$university->latitude],
                ],
                'properties' => [
                    'name' => $university->name,
                    'description' => $university->short_description,
                    'website' => $university->website,
                ],
            ];

            $features[] = $feature;
        }

        $geoJSON = [
            'type' => 'FeatureCollection',
            'features' => $features,
        ];

        return response()->json($geoJSON);
    }

    public function university_search_multiple(Request $request)
    {

        $departments = Department::where('status', 1)->get();

        return view('frontendpanel.university.search-university', compact('departments'));
    }

    public function university_search_result(Request $request)
    {
        $sscResult = request('ssc');
        $hscResult = request('hsc');
        $selectedSubjects = request('subject');
        $selectedDepartments = request('department');

        // Check if SSC and HSC results are provided, as they are required
        if (empty($sscResult) || empty($hscResult)) {
            // Handle the case where SSC or HSC results are missing
            // You can return an error message or redirect back to the form
            return redirect()->back()->with('error', 'Please provide SSC and HSC results.');
        } else {
            // Create the base query with required conditions
            $query = University::with('images')
                ->where('status', 1)
                ->where('ssc', '<=', $sscResult)
                ->where('hsc', '<=', $hscResult);

            // If subjects are selected, filter universities based on matching subjects
            if (!empty($selectedSubjects) && is_array($selectedSubjects)) {
                // Initialize an array to store matching department IDs
                $matchingDepartmentIds = [];

                // If subjects are selected, find the matching department IDs
                if (!empty($selectedSubjects) && is_array($selectedSubjects)) {
                    foreach ($selectedSubjects as $subject) {
                        // Find departments with matching subjects
                        $matchingDepartments = Department::where('subject', 'Like', "%$subject%")->pluck('id')->toArray();
                        // Add matching department IDs to the array
                        $matchingDepartmentIds = array_merge($matchingDepartmentIds, $matchingDepartments);
                    }
                    // Convert department IDs to strings
                    $matchingDepartmentIds = array_map('strval', $matchingDepartmentIds);

                    // Remove duplicate department IDs (if any)
                    $matchingDepartmentIds = array_unique($matchingDepartmentIds);

                    // return $matchingDepartmentIds;
                    $query->where(function ($query) use ($matchingDepartmentIds) {
                        foreach ($matchingDepartmentIds as $subject) {
                            $query->orWhereJsonContains('department_id', $subject);

                        }
                    });
                }
            }

            if (!empty($selectedDepartments) && is_array($selectedDepartments)) {
                // return $selectedDepartments;
                // Ensure $selectedDepartments is an array and use it with orWhereJsonContains
                $query->where(function ($query) use ($selectedDepartments) {
                    foreach ($selectedDepartments as $department) {
                        $query->orWhereJsonContains('department_id', $department);
                    }
                });
            }
            // Get the results
            $universities = $query->get();
        }

        return view('frontendpanel.University.university', compact('universities'));
    }


    public function contact_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;

        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }


    public function subscribe_news(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $subscribe = new Subscription();
        $subscribe->email = $request->email;
        $subscribe->category = null;
        $subscribe->type = 'news subscription';
        $subscribe->save();

        return redirect()->back()->with('success', 'You have subscribed successfully.');
    }

}
