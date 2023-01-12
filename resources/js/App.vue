<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-primary bg-success">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav" >
                    <router-link to="/login" class="nav-item nav-link text-light font-weight-bold"> Login </router-link>
                    <router-link to= "/register" class="nav-item nav-link text-light font-weight-bold"> Register </router-link>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
<script>export default{}</script>
