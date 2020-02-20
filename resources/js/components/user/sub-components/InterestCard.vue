<template>
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <div class="card-header">{{title}}</div>
    <div class="card-body">
        <h5 class="card-title">{{state}}</h5>
        <p class="card-text">{{position}}</p>
        <p class="card-text"><small class="text-muted">{{city}}</small></p>
        <i class="fa fa-plane fa-4x" style="position: absolute; right: 30px; top: 60px;"></i>
    </div>
    </div>
</template>

<script lang="ts">

export default {
    props: [
        'title',
        'position',
        'state',
        'city',
    ]    
}
</script>