<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Update {{ contact.name }}'s Details</p>
                <button class="delete" aria-label="close" @click='close'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Please Enter Name" v-model='contact.name'>
                    </div>
                    <small v-if="errors.name" class='has-text-danger'>{{ errors.name[0] }}</small>
                </div>

                <div class="field">
                    <label class="label">Phone </label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.phone_number}" type="number" placeholder="Please Phone Number" v-model='contact.phone_number'>
                    </div>
                    <small v-if="errors.phone_number" class='has-text-danger'>{{ errors.phone_number[0] }}</small>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Please Enter Email" v-model='contact.email'>
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
                contact: { },

                errors: { }
            }
        },

        methods: {
            close() {
                this.$emit('closeRequest');
            },

            saveContact() {
                axios.patch('/phonebook/'+this.contact.id, this.$data.contact)
                    .then((response)=>this.close())
                    .catch((error)=>this.errors = error.response.data.errors);
                this.contact = '';
            }
        }
    }
</script>