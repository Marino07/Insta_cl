<template>
    <div>
        <button
            class="bg-blue-500 text-white px-1 py-0 rounded-md hover:bg-blue-300 focus:outline-none"
            @click="FollowUser" v-text="buttonText"
        >
        </button>
    </div>
</template>

<script>
export default {
    props: ['userId', 'follows'],
    data: function () {
        return {
            status: this.follows
        };
    },
    mounted() {
        console.log('Component mounted')
    },
    methods: {
        FollowUser() { // Preimenovana metoda za bolju čitljivost
            axios.post(`/follow/${this.userId}`).then(response => {
                this.status = !this.status // Očekuje se da mijenja stanje
            }).catch(errors => {
                console.error(errors);
                if (errors.response && errors.response.status === 401) {
                    window.location = '/login';
                }
            });
        }
    },
    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
};

</script>

<style scoped>

</style>
