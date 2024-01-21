
require('./bootstrap')

import { createApp } from 'vue'
//import File from './components/RolePermissionComponent'
// import BatchFile from './components/BatchFileComponent'
// import StudentBatch from './components/StudentBatchComponent'

const app = createApp({})
// app.component('file', File)
// app.component('batch-file', BatchFile)
// app.component('student-batch', StudentBatch)

app.mount('#app')