const { createApp } = Vue;

createApp({
  data() {
    return {
      user: {},
      error: ""
    };
  },
  created() {
    // this.displayUser();
    console.log("created");
  },
  methods: {
    displayUser() {
      const data = new FormData();
      data.append("method", "displayUser");
      axios.post(`../api/index.php`, data).then((r) => {
        this.user = r.data;
      });
    },
    login(e) {
      e.preventDefault();
      const b =this
      const data = new FormData(e.currentTarget);
      data.append("method", "login");
      axios.post(`../api/index.php`, data).then((r) => {

        if (r.data === 1) {
          location.href = "../back-end/all-users.php";
        } else if(r.data === 0) {
          location.href = "index.php";
        } else if(r.data === 'locked') {
          alert('account is locked');
        }
        else {
          //alert("Unauthenticated");
          b.error="Unauthenticated"
        }
      });
    },
    register(e) {
      e.preventDefault();
      if(e.target.password.value != e.target.confirm_password.value) {
        alert('Passwords do not match');
        return false;
      }
      const data = new FormData(e.currentTarget);
      data.append("method", "register");
      axios.post(`../api/index.php`, data).then((r) => {
        if (r.data == 0) {
          location.href = "index.php";
        } else {
          console.log(r.data);
          alert("Error: Data not saved");
        }
      });
    },
  },
}).mount("#app");
