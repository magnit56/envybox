<template>
    <div class="container">
        <div class="row justify-content-center">
            <b-form class="col-md-8" @submit.stop.prevent="onSubmit">
                <b-alert variant="success" show v-if="submitted">Сообщение отправлено</b-alert>
                <b-form-group id="name-group" label="Имя" label-for="name">
                    <b-form-input type="text" class="form-control" id="name" name="name" placeholder="Alex" v-model="$v.form.name.$model" :state="validateState('name')" aria-describedby="name-live-feedback"></b-form-input>
                    <b-form-invalid-feedback id="name-live-feedback">Обязательное поле</b-form-invalid-feedback>
                </b-form-group>

                <b-form-group id="phone-group" label="Телефон" label-for="phone">
                    <b-form-input type="text" class="form-control" id="phone" name="phone" placeholder="88005553535" v-model="$v.form.phone.$model" :state="validateState('phone')" aria-describedby="phone-live-feedback"></b-form-input>
                    <b-form-invalid-feedback id="phone-live-feedback">В поле должен быть номер телефона в формате 88005553535</b-form-invalid-feedback>
                </b-form-group>

                <b-form-group id="message-group" label="Текст обращения" label-for="message">
                    <b-form-textarea class="form-control" id="message" rows="3" placeholder="Мое сообщение" v-model="$v.form.message.$model" :state="validateState('message')" aria-describedby="message-live-feedback"></b-form-textarea>
                    <b-form-invalid-feedback id="message-live-feedback">Обязательное поле</b-form-invalid-feedback>
                </b-form-group>
                <button class="btn btn-primary" type="submit">Отправить обращение</button>
            </b-form>
        </div>
    </div>
</template>

<script>
    import { validationMixin } from "vuelidate";
    import { required, minLength, maxLength, numeric } from "vuelidate/lib/validators";
    export default {
        mixins: [validationMixin],
        data() {
            return {
                form: {
                    name: null,
                    phone: null,
                    message: null,
                },
                submitted: false,
            };
        },
        validations: {
            form: {
                name: {
                    required,
                },
                phone: {
                    required,
                    numeric,
                    minLength: minLength(11),
                    maxLength: maxLength(11),
                },
                message: {
                    required,
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onSubmit() {
                this.$v.form.$touch();
                if (this.$v.form.$anyError) {
                    return;
                }
                return axios.post('/api', this.form)
                    .then(response => console.log(response.data))
                    .catch(error => console.log(error))
                    .then(() => this.resetForm())
                    .then(() => this.submitted = true);
            },
            resetForm() {
                this.form = {
                    name: null,
                    phone: null,
                    message: null,
                };

                this.resetFlash();

                this.$nextTick(() => {
                    this.$v.$reset();
                });
            },
            resetFlash() {
                this.submitted = false;
            },
            validateState(name) {
                const { $dirty, $error } = this.$v.form[name];
                return $dirty ? !$error : null;
            },
        },
        watch: {
            form: {
                handler (val, oldVal) {
                    this.submitted = false;
                },
                deep: true,
            },
        },
    }
</script>
