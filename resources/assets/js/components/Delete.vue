<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Delete {{ contact.name }}</p>
                <button class="delete" aria-label="close" @click='close'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Are you sure you want to delete this contact??</label>
                    <div class="control">
                    </div>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click='deleteContact(key)'>Delete Contact</button>
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
                contact: { },
                key :'',

                errors: { }
            }
        },

        methods: {
            close() {
                this.$emit('closeRequest');
            },

            deleteContact() {
                axios.delete('/phonebook/'+this.contact.id, this.$data.contact)
                    .then((response)=>{
                        this.$parent.contactList.splice(this.key, 1);
                        this.close();
                    })
                    .catch((error)=>this.errors = error.response.data.errors);
                this.contact = '';

            }
        }
    }
</script>