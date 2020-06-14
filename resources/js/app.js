/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('modal', {
  template: '#modal-template'
})

const app = new Vue({
    el: '#app_vue',
    data: {
      newTask: {'name': '', 'profession': '','task':''},
      hasError: true,
      tasks: [],
      showModal: false,
      e_id: '',
      e_name: '',
      e_profession: '',
      e_task: '',
    },
    mounted: function mounted(){
      this.getTask();
    },
    methods: {
      getTask: function getTask(){
        var _this = this;
        axios.get('/gettask').then(function (response){
          _this.tasks = response.data;
          //$(document).ready(function() {
          //  $('#table').DataTable();
          //});
        });
      },
      deleteTask: function deleteTask(task){
        var _this = this;
        axios.post('/deletetask/' + task.id).then(function (response){
          _this.getTask();
        });
      },
      setVal: function setVal(val_id, val_name, val_profession, val_task) {
        this.e_id = val_id;
        this.e_name = val_name;
        this.e_profession = val_profession;
        this.e_task = val_task;
      },
      editTask: function editTask(){
        var id_val = document.getElementById('e_id');
        var name_val = document.getElementById('e_name');
        var profession_val = document.getElementById('e_profession');
        var task_val = document.getElementById('e_task');
        var _this = this;
         axios.post('/edittask/' + id_val.value, {value_1: name_val.value, value_2: profession_val.value,value_3: task_val.value })
           .then(response => {
            _this.getTask();
             this.showModal=false
           });
         //this.hasDeleted = true;
      },
      createTask: function createTask(){
        var input = this.newTask;
        var _this = this;
        if(input['name'] == '' || input['profession'] == '' || input['task'] == ''){
          this.hasError = false;
        }else{
          this.hasError = true;
          axios.post('/createtask', input).then(function (reponse){
             _this.newTask = {'name': '', 'profession': '','task':''}
             _this.getTask();
          });
        }
      }
    }
});
