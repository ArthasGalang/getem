<style>
    .products-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        background-color: rgb(228, 228, 228);
    }
    .product-item {
        width: 150px;
        text-align: center;
        cursor: pointer;
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-item img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .product-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .product-name {
        margin-top: 5px;
        padding: 5px;
        font-size: 1em;
        color: #333;
    }
    .add-product {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 150px;
        height: 150px;
        text-align: center;
        cursor: pointer;
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 2px dashed #ccc;
    }
    .add-product:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    #addProductForm {
        display: none;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
    }
    #addProductForm label {
        display: block;
        margin-bottom: 10px;
    }
    #addProductForm input {
        display: block;
        margin-bottom: 20px;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    #addProductForm button {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #addProductForm button:hover {
        background-color: #218838;
    }
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>

<div class="products-grid" id="productsGrid">
    <button class="add-product" onclick="window.location.href='add-product.php'">
        <div>+</div>
        <div>Add Product</div>
    </button>
</div>

<script>
</script>


