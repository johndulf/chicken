const { createApp } = Vue;

createApp({
    data() {
        return {
            users: [],
        }
    },
    created() {
        this.displayAllUser();
    },
    methods: {
        displayAllUser() {
            const data = new FormData();
            data.append('method', 'displayAllUser');
            axios.post(`../api/index.php`, data).then((r) => {
                this.users = r.data;
                console.log(r.data);
            })
        },
        updateCounterlock(userId, counterlock) {
            if(confirm('Are you sure you want to proceed with this action?')) {
                const data = new FormData();
                data.append('userId', userId);
                data.append('counterlock', counterlock);
                data.append('method', 'updateCounterlock');
                axios.post(`../api/index.php`, data).then((r) => {
                    this.displayAllUser();
                })
            }
        }
    }

}).mount('#pageWrapper');