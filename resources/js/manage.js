require('./bootstrap-manage');



import Form from "./core/Form";
import Users from "./views/manage/Users/Users";
import Roles from "./views/manage/Roles/Roles";
import Setting from "./core/Setting";

window.Form = Form;


new Vue({
    el: '#kt_content',
    components: {
        Users,
        Roles
        },
})
