<template>
    <img :src="src" class="img-fluid" alt="Banner" style="width: 100%;">
</template>

<script>
export default {
    name: 'Banner',
    props: ['src']
}
</script>