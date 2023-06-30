const { createApp } = Vue;

createApp({
  data() {
    return {
      // favorite:[],
      products: [],
      product: {},
      carts: [],
      // isFavoritesPage: false,
      editQuantity: 0,
      editPrice: 0,
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
    // this.displayFavorites();
    // if (window.location.pathname === '/favorites.php') {
    //   this.isFavoritesPage = true;
    // }
  },

  methods: {
    removeCart(id) {
      if (confirm("Are you sure you want to remove this?")) {
        const data = new FormData();
        data.append("method", "removeCart");
        data.append("id", id);
        axios.post("../api/index.php", data).then((res) => {
          if (res.data == 1) {
            alert("Removed Successfully!");
            this.displayCarts();
          } else {
            console.log(res.data);
            alert("Something went wrong. Please try again later!");
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
          alert("Something went wrong. Please try again!");
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
          alert("Something went wrong. Please try again later!");
        }
      });
    },
    // displayFavorites() {
    //   const data = new FormData();
    //   data.append("method", "displayFavorites");
    //   axios.post("../api/index.php", data).then((res) => {
    //     console.log(res.data);
    //     this.favorite = res.data;
    //   });
    // },
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
          // this.displayFavorites();
        }
      });
    },
editProduct(product) {
  this.product = product;
  this.editQuantity = product.quantity;
  this.editPrice = product.price;
  var modal = document.getElementById("editProduct");
  var modalInstance = new bootstrap.Modal(modal);
  modalInstance.show();
},
saveChanges() {
  const data = new FormData();
  data.append("method", "editProduct");
  data.append("id", this.product.id);
  data.append("quantity", this.editQuantity);
  data.append("price", this.editPrice);
  axios.post("../api/index.php", data).then((res) => {
    if (res.data == 1) {
      alert("Changes have been saved!");
      this.displayProducts();
      var modal = document.getElementById("editProductConfirmation");
      var modalInstance = new bootstrap.Modal(modal);
      modalInstance.show();
    } else {
      console.log(res.data);
      alert("Something went wrong. Please try again later!");
    }
  });
  // Refresh the page
  window.location.reload();
},
  },
}).mount("#app");
