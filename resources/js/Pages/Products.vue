<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';
import { Inertia } from '@inertiajs/inertia';

const calculate_discount_percentage = (total_price = 0, discount_price = 0) =>  Math.trunc((discount_price * 100)/total_price) ;

const calculate_final_sale_price =  (product) =>  product.sale_price - product.sale_discount_price;

const calculate_final_rent_price =  (product) => {
	return (product.rentable) ? product.rent_price - product.rent_discount_price : 0;
}

const product_details = (product, ...rest) => {
	const  [affiliation_code ] = rest ;
	Inertia.get(
		route('web.product_details', [product, affiliation_code]),
		{},
		{preserveScroll: false}
	);
}

const props = defineProps({
	products: []
});


// fetch('webapi/product').then((raw) => raw.json()).then(data => {
// 	products.fill(data);
// })




// const products = (props?.products.length > 0) ? props?.products : [
const products =  [
	{
		id: 1,
		name : "360° Video Booth",
		description: "Fancy 360° video capturing device for all your events.",
		long_description: "",
		is_new: true,
		sale_price: 300000,
		sale_discount_price: 10000,
		rentable: true,
		rent_price: 10000,
		rent_period: "hr" ,
		rent_discount_price: 0,
		image: "/img/booth/360 booth 6.jpg",
		other_images: [
			"/img/booth/360 booth 2.jpg",
			"/img/booth/360 booth 11.jpg",
			"/img/booth/360 booth 4.jpg",
			"/img/booth/360 booth 5.jpg",
		],
		available: true,
		reviews: []
	},
	// {
	// 	id: 2,
	// 	name : "Auto Hand washer",
	// 	description: "Avoid physical contact and stay safe by using our contactless automatic hand washer.",
	// 	long_description: "",
	// 	is_new: true,
	// 	sale_price: 150000,
	// 	sale_discount_price: 0,
	// 	rentable: false,
	// 	rent_price: null,
	// 	rent_period: "hr" ,
	// 	rent_discount_price: null,
	// 	image: "/img/booth/360 booth 5.jpg",
	// 	other_images: [
	// 		"/img/booth/360 booth 7.jpg",
	// 		"/img/booth/360 booth 8.jpg",
	// 		"/img/booth/360 booth 10.jpg",
	// 	],
	// 	available: true,
	// 	reviews: []
	// }
];


	let affiliation_code = null; // ( $page.props.auth.user ) ? $page.props.auth.user.affiliation_code : null;

</script>

<template>

	<SiteLayout title="Our Products">
		<template #banner>
			<section class="p-8 pt-24 mx-auto">
				<!-- text - start -->
					<div class="mb-10 md:mb-16">
						<h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Our Catalog</h2>

						<p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">
							Checkout out some of our high quality products that are currently available and offered  to you at the lowest possible prices on the market.
						</p>
					</div>
					<!-- text - end -->

			</section>
		</template>

		<template #content>


			<div class="bg-white py-3 sm:py-8 lg:pb-12">
				<div class="max-w-screen-2xl px-4 md:px-8 mx-auto">

					<div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-8 scale-90">
						<!-- product - start -->
						<div v-for="product in products" v-bind:key="'product-'+product.id" class="group">
							<div
							v-on:click="product_details(product)"
								class="group group h-80 block bg-gray-100 rounded-lg overflow-hidden shadow-lg relative mb-2 lg:mb-3">
								<img v-bind:src="product.image"
									loading="lazy" v-bind:alt="product.name"
									class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />

									<a :href="'https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.mydesigngenius.com%2Fproduct%2Fdetails%2F'+product.id+'%2Freferrer='+affiliation_code"
									target="_blank"
									class="lg:hidden cursor-pointer group-hover:block p-3 duration-200 rounded-full bg-white bg-opacity-90  text-slate-800 hover:text-white hover:bg-red-700 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
										</svg>
									</a>

								<div class="flex gap-2 absolute left-0 bottom-2">
									<span v-if="product.sale_discount_price > 0" title="sale discount"
										class="bg-red-600 text-white text-sm font-semibold tracking-wider uppercase rounded-r-lg px-3 py-1.5">
										-{{calculate_discount_percentage(product.sale_price, product.sale_discount_price)}}%
										</span>
									<span v-if="product.rentable && product.rent_discount_price > 0" title="rent discount"
										class="bg-green-600 text-white text-sm font-semibold tracking-wider uppercase rounded-lg px-3 py-1.5">
										-{{calculate_discount_percentage(product.rent_price, product.rent_discount_price)}}%
										</span>
									<span v-if="product.is_new"
										class="bg-white text-gray-800 text-sm font-bold tracking-wider uppercase rounded-lg px-3 py-1.5 ml-auto">New</span>
								</div>
							</div>

							<div class="flex justify-between items-start gap-2 px-2">
								<div class="flex flex-col">
									<Link v-bind:href="'/product/details/'+product.id"
										class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">
										{{ product.name }}
										</Link>
									<span class="text-gray-500">by Design Genius</span>
								</div>

								<div class="flex flex-col items-end">
									<span class="text-gray-600 lg:text-lg font-bold">{{  calculate_final_sale_price(product) }} F CFA</span>
									<span v-if="product.sale_discount_price && (product.sale_discount_price > 0) " class="text-red-500 text-sm line-through"> {{ product.sale_price}} F CFA</span>
								</div>
							</div>
						</div>
						<!-- product - end -->


					</div>
				</div>
			</div>
		</template>

	</SiteLayout>

</template>


<style>
</style>
