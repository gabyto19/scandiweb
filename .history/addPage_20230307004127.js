Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      selectedProductType: "dvd",
      size: "",
      weight: "",
      height: "",
      width: "",
      length: "",
    };
  },
  methods: {
    submitForm() {
      // Check if all required fields are filled
      if (this.sku === "" || this.name === "" || this.price === "") {
        alert("Please submit required data");
      } else if (this.selectedProductType === "dvd" && this.size === "") {
        alert("Please submit required data");
      } else if (this.selectedProductType === "book" && this.weight === "") {
        alert("Please submit required data");
      } else if (
        this.selectedProductType === "furniture" &&
        (this.height === "" || this.width === "" || this.length === "")
      ) {
        alert("Please submit required data");
      } else {
        // Send the data to the PHP f
          .post("insert-product.php", {
            sku: this.sku,
            name: this.name,
            price: this.price,
            productType: this.selectedProductType,
            size: this.size,
            weight: this.weight,
            height: this.height,
            width: this.width,
            length: this.length,
          })
          .then((response) => {
            console.log(response.data);
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
}).mount("#app");
