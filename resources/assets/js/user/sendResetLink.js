
import Errors from '../helpers/Errors'

const app = new Vue({
    el: '#app',

    data: {
      form: {
         email: ''
      },
      errors: new Errors(),
      loading: false,
      success: false,
      successMessage: ''
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

         axios.post('/password/email', this.form)
           .then( res => {
             that.successMessage = res.data.status;
             that.success = true;
             that.loading = false;
           })
           .catch( error => {
             if (error.response.status === 500){
                console.log('error', error);
             }
             else{
                that.errors.record(error.response.data.errors);
                that.loading = false;
             }
           });
      }
   }
});
