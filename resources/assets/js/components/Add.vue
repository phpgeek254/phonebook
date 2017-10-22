<template>
	<div class="modal" :class='openmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
     <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Please Enter Name" v-model='list.name'>
  </div>
  <small v-if="errors.name" class='has-text-danger'>{{ errors.name[0] }}</small>
</div>

 <div class="field">
  <label class="label">Phone </label>
  <div class="control">
    <input class="input" :class="{'is-danger':errors.phone_number}" type="number" placeholder="Please Phone Number" v-model='list.phone_number'>
  </div>
  <small v-if="errors.phone_number" class='has-text-danger'>{{ errors.phone_number[0] }}</small>
</div>

 <div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Please Enter Email" v-model='list.email'>
  </div>
  <small v-if="errors.email" class='has-text-danger'>{{ errors.email[0] }}</small>
</div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click='saveContact'>Save changes</button>
      <button class="button" @click='close'>Cancel</button>
    </footer>
  </div>
</div>
</template>

<script>
	export default {
		props:['openmodal'],

		data() {
			return {
				list: {
					name:'',
					phone_number:'',
					email:''
				},

        errors: {

        }
			}
		},

		methods: {
			close() {
				this.$emit('closeRequest');
			},

      clearFields(){
        for(var prop in this.list){
          if(this.list.hasOwnProperty(prop)){
            console.log(prop +' = '+ this.list[prop]);
            this.list[prop] = '';
          }
        }
            
      },

			saveContact() {
				axios.post('/phonebook', this.$data.list)
					 .then((response)=>{
            this.clearFields();
            this.close()
            this.$parent.contactList.push(response.data);
           })
					 .catch((error)=>this.errors = error.response.data.errors);
            
				
			}
		}
	}
</script>