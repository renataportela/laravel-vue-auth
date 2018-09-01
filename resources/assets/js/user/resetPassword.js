
import Errors from '../helpers/Errors'

const app = new Vue({
    el: '#app',

    data: {
      form: {
         email: '',
         password: '',
         password_confirmation: '',
         token: window.resetToken
      },
      errors: new Errors(),
      loading: false
    },

    computed: {
       errorMessage(){
          return field => this.errors.get(field)
       },

       hasError(){
          return field => this.errors.has(field)
       }
    },

    methods: {
      submitForm(){
         this.loading = true;
         this.errors.clearAll();

         let that = this;

         axios.post('/password/reset', this.form)
           .then( response => {
             window.location.href = '/home';
           })
           .catch( error => {
             that.loading = false;

             if (error.response.status === 500){
                console.log('error', error);
             }
             else{
                that.errors.record(error.response.data.errors);
             }
           });
      }
   }
});
