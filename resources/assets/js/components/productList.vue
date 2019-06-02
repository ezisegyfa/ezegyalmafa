<template>
	<div class="row text-center text-lg-left">
		<div class="col-lg-3 col-md-4 col-xs-6" v-for="productType in productTypes">
	        <article class="col-item">
	      		<div class="photo">
	      			<div class="options-cart">
	      				<a href="{{ APP_URL + "/products/" . productType.id }}">
	        				<button class="btn btn-default" title="Add to cart">
	        					<span class="fa fa-shopping-cart"></span>
	        				</button>
	        			</a>
	      			</div>
	      			<a href="{{ APP_URL + "/products/" . productType.id) }}"> <img src="{{ productType.mainImageLink }}" class="img-responsive" alt="Product Image" /> </a>
	      		</div>
	      		<div class="info">
	            	<h5>{{ productType.name }}</h5>
	            	<div class="price-details" v-if="productType.price">
	      				<span class="price-new">${{ productType.price }}</span>
	            	</div>
	      		</div>
	      	</article>
        </div>
    </div>
</template>

Vue.component('product-list', {
	data: function () {
	    return {
	    	productTypes : []
	    }
 	},
	methods() {
		read() {
			window.axios.get('/api/cruds').then(({ sendedProductTypes }) => {
				this.productTypes = sendedProductTypes
			})
		},
	},
})