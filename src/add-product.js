const { createApp } = Vue;

createApp({
  data() {
    return {};
  },

  methods: {
    addProduct(e) {
      e.preventDefault();
      const data = new FormData(e.currentTarget);
      data.append("method", "addProduct");
      axios.post("../api/index.php", data).then((res) => {
        if (res.data == 1) {
          alert("Added successfully!");
          e.target.reset();
          window.location.href = "../back-end/products.php";
        } else {
          console.log(res.data);
          alert(res.data);
        }
      });
    },
  },
}).mount("#pageWrapper");
