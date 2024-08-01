<template>
    <div>
        <button
            class="bg-blue-500 text-white px-1 py-0 rounded-md hover:bg-blue-300 focus:outline-none"
            @click="FollowUser"
        >
            Follow
        </button>
    </div>
</template>

<script>
export default {
    props: ['userId'],
    methods: {
        FollowUser() {
            axios.post('/follow/' + this.userId).then(response => {
                alert(response.data)
            });
        },
    },
};
</script>

<style scoped>

</style>
