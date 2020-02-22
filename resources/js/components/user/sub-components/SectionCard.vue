<template>
    <div class="card">
        <div class="card-header">
            <i :class="faIcon"></i>{{title}}
        </div>
        <div class="card-body">
            <!-- <UpdateUser /> -->
            <slot />
        </div>
    </div>
</template>

<script>

// import UpdateUser from '../forms/UpdateUser.vue';

export default {
    name: 'SectionCard',
    components: {
        // UpdateUser,
    },
    props: [
        'title',
        'faIcon'
    ]
}
</script>