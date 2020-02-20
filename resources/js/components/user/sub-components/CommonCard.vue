<template>
    <div class="card text-white bg-dark mb-3">
    <div class="card-header">{{title}}</div>
    <div class="card-body">
        <h5 class="card-title">{{top}}</h5>
        <p class="card-text">{{middle}}</p>

        <p class="card-text" v-show="!to"><small class="text-muted">{{bottom}}</small></p>
        <p class="card-text" v-show="to">
            <small class="text-muted">
                <router-link to="/buy-surveys" class="text-muted">{{bottom}}</router-link>
            </small>
        </p>

        <i :class="faIcon" style="position: absolute; right: 30px; top: 60px;"></i>
    </div>
    </div>
</template>

<script>

export default {
    name: 'CommonCard', 
    props: {
        title: String,
        bottom: String,
        middle: String,
        top: String,
        faIcon: String,
        to: String,
    }
}
</script>