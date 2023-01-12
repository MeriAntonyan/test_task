<template>
    <form class="mt-5 w-50 mx-auto">
        <h1>Login</h1>
        <p v-if="error" class="text-danger">{{ error }}</p>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" v-model="form.email" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" v-model="form.password"/>
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">

            <div class="col">
                <!-- Simple link -->
                <a href="#">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4" @click="login()">Sign in</button>

        <!-- Register buttons -->

    </form>
</template>
<script>


export default {
    data() {
        return {
            form: {
                email: "",
                password: null
            },
            error: null
        }
    },

    methods: {
       async login() {
            await this.axios.post('api/login', this.form).then((res) => {
                console.log(res);
                this.error = res.data.message;

            })
        }
    }
}
</script>
