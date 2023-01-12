<template>
    <div class="mt-5">
        <form class="mx-1 mx-md-4">

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input v-model="form.name" type="text" id="form3Example1c" class="form-control" required />
                    <label class="form-label" for="form3Example1c">Your Name</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input v-model="form.email" type="email" id="form3Example3c" class="form-control" required />
                    <label class="form-label" for="form3Example3c">Your Email</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input v-model="form.password" type="password" id="form3Example4c" class="form-control" required />
                    <label class="form-label" for="form3Example4c">Password</label>
                </div>
            </div>


            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <button type="button" class="btn btn-primary btn-lg" @click="register()">Register</button>
            </div>

        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: null
            },
        }
    },

    methods: {
       async register() {
            await this.axios.post('api/register', this.form).then((res) => {
                console.log(res);
            })
        }
    }
}
</script>

