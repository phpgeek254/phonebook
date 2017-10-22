<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading" style="padding:30px;">
                Vue JS PHONEBOOK
                <button class="button is-link is-block is-pulled-right" @click="openModal">
                    <i class="fa fa-plus"></i> Add New Contact
                </button>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="Search Contact"
                    v-model='searchQuery'>
                    <span class="icon is-small is-left">
        <i class="fa fa-search"></i>
      </span>
                </p>
            </div>


            <a class="panel-block" v-for="item,key in temp">
  	<span class="column is-6">
  		{{ item.name }}
  	</span>

                <span class="panel-icon column is-block is-2has-text-primary">
      <i class="fa fa-folder-open fa-2x" @click="showModal(key)"></i>
    </span>

                <span class="panel-icon column is-block is-2has-text-primary">
      <i class="fa fa-pencil fa-2x" @click="openUpdate(key)"></i>
    </span>

                <span class="panel-icon column is-block is-2has-text-danger">
     <i class="fa fa-trash fa-2x" @click="openDelete(key)"></i>
    </span>

            </a>

        </nav>
        <Add :openmodal='addActive' @closeRequest='close'></Add>
        <Show :openmodal='showActive' @closeRequest="close"></Show>
        <Update :openmodal='updateActive' @closeRequest="close"></Update>
        <Delete :openmodal='deleteActive' @closeRequest="close"></Delete>
    </div>

</template>
<script>
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    let Update = require('./Update.vue')
    let Delete = require('./Delete.vue')

    export default {
        components: {
            Add, Show, Update, Delete
        },
        mounted() {
            this.getData();
        },

        data() {
            return {
                addActive: '',
                showActive: '',
                updateActive: '',
                deleteActive: '',
                searchQuery: '',
                temp:'',
                contactList: {},
            }
        },

        watch:{
        searchQuery(){
          if(this.searchQuery.length > 0)
          {
            this.temp = this.contactList.filter((item) => {
              return Object.keys(item).some((key)=>{
                let string = String(item[key])
                return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
              })
            })
          } else {
            this.temp = contactList;
          }
        }
        },
        methods: {
            openModal() {
                this.addActive = 'is-active';
            },

            showModal(key) {

                this.$children[1].contact = this.temp[key]
                console.log(this.$children[1].contact.id)
                this.showActive = 'is-active';
            },

            openUpdate(key) {
              console.log(this.temp[key])
                this.$children[2].contact = this.temp[key];
                this.updateActive = 'is-active'
            },

            openDelete(key){
            this.$children[3].contact = this.temp[key]
            this.$children[3].key = this.temp[key]
            this.deleteActive = 'is-active'
            },

            close() {
                this.addActive = '';
                this.showActive = '';
                this.updateActive='';
                this.deleteActive='';
            },

            getData() {
                axios.get('phonebook/')
                    .then((response) => this.temp = this.contactList = response.data)
                    .catch((error) => console.log(error))
            }
        }
    }
</script>