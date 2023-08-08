require('./bootstrap-manage');



import Form from "./core/Form";
import Users from "./views/manage/Users/Users";
import Roles from "./views/manage/Roles/Roles";
import Courses from "./views/manage/Courses.vue";
import NewCourse from "./views/manage/components/courses/NewCourse.vue";
import EditCourse from "./views/manage/components/courses/EditCourse.vue";
import Setting from "./core/Setting";

window.Form = Form;


new Vue({
    el: '#kt_content',
    components: {
        Users,
        Roles,
        Courses,
        NewCourse,
        EditCourse
        },
})
