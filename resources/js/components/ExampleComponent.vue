<template>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-8" @submit.prevent="onSubmit">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" placeholder="Alex" v-model="form.name">
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input id="phone" class="form-control" name="phone" type="text" placeholder="88005553535" v-model="form.phone">
                </div>
                <div class="form-group">
                    <label for="message">Текст обращения</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Мое сообщение" v-model="form.message"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Отправить обращение</button>
            </form>
        </div>
    </div>
</template>

<script>
    // import { required, email } from '@vuelidate/validators';
    // import { useVuelidate } from '@vuelidate/core';
    export default {
        data() {
            return {
                form: {
                    name: null,
                    phone: null,
                    message: null,
                },
                flash: null,
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            async onSubmit() {
                // console.log('submitted');
                // console.log(this.form);
                await axios.post('/api', this.form)
                    .then(response => console.log(response.data))
                    .catch(error => console.log(error));
            }
        },
        // setup: () => ({ v$: useVuelidate() }),
        // validations () {
        //     return {
        //         form: {
        //             name: { required, email },
        //             phone: { required },
        //             message: { required },
        //         }
        //     }
        // }
    }
</script>
