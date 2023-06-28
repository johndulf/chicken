const { createApp } = Vue;

createApp({
  data() {
    return {
      products: [],
      product: {},
      carts: [],
    };
  },

  computed: {
    getTotal() {
      if (this.carts.length > 0) {
        const totalSum = this.carts.reduce((accumulator, cart) => accumulator + cart.total, 0);
        const formatter = new Intl.NumberFormat("fil-PH", { style: "currency", currency: "PHP" });
        const formattedTotal = formatter.format(totalSum);
        return formattedTotal;
      } else {
        return 0;
      }
    },
  },

  created() {
    this.displayProducts();
    this.displayCarts();
  },

  methods: {
    removeCart(id) {
      if (confirm("Are you want to remove this?")) {
        const data = new FormData();
        data.append("method", "removeCart");
        data.append("id", id);
        axios.post("../api/index.php", data).then((res) => {
          if (res.data == 1) {
            alert("Removed Successfully!");
            this.displayCarts();
          } else {
            console.log(res.data);
            alert("Something went wrong please try again later!");
          }
        });
      }
    },
    displayCarts() {
      const data = new FormData();
      data.append("method", "displayCarts");
      axios.post("../api/index.php", data).then((res) => {
        console.log(res.data);
        this.carts = res.data;
      });
    },
    addToCart(id) {
      const data = new FormData();
      data.append("method", "addToCart");
      data.append("product_id", id);
      axios.post("../api/index.php", data).then((res) => {
        console.log(res.data);
        if (res.data == 1) {
          this.displayCarts();
        } else {
          console.log(res.data);
          alert("something went wrong please try again!");
        }
      });
    },

    getProduct(product) {
      this.product = product;
      var modal = document.getElementById("deleteProduct");
      var modalInstance = new bootstrap.Modal(modal);
      modalInstance.show();
    },

    deleteProduct() {
      const data = new FormData();
      data.append("method", "deleteProduct");
      data.append("id", this.product.id);
      axios.post("../api/index.php", data).then((res) => {
        if (res.data == 1) {
          this.displayProducts();
        } else {
          console.log(res.data);
          alert("Something went wrong please try again later!");
        }
      });
    },

    displayProducts() {
      const data = new FormData();
      data.append("method", "displayProducts");
      axios.post("../api/index.php", data).then((res) => {
        this.products = res.data;
      });
    },
    favorites(id) {
      const data = new FormData();
      data.append("id", id);
      data.append("method", "favorites");
      axios.post("../api/index.php", data).then((res) => {
        console.log(res.data);
        if (res.data == 1) {
          this.displayProducts();
        }
      });
    },
  },
}).mount("#app");
