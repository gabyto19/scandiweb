Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
      deleteIds: [],
    };
  },
  methods: {
    deleteProduct() {
      if (this.deleteIds.length === 0) {
        alert("Please select products to delete.");
        return;
      }
      
      if (confirm("Are you sure you want to delete the selected products?")) {
        axios.post('delete_products.php', { ids: this.deleteIds })
          .then(response => {
            if (response.data.success) {
              // Remove the deleted products from the local products array
              this.products = this.products.filter(product => !this.deleteIds.includes(product.id));
              
              // Reset the deleteIds array
              this.deleteIds = [];
              
              alert(response.data.message);
            } else {
              alert(response.data.error);
            }
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  },
  created() {
    axios.get('get_products.php')
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
 
}).mount("#app");
