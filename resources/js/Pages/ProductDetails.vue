<script setup >
import { Head, Link } from '@inertiajs/inertia-vue3';
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';

const products = [
	{
		id: 1,
		name: "360° Video Booth",
		description: "Fancy 360° video capturing device for all your events.",
		long_description: "Recently, 360 video booths have become extremely popular and people from all over the world want to test them out and give them a try. They have quickly become a way to help take the photo booth industry to the next level. Not only does this make the event more exciting and innovative, but it helps everyone create and save amazing memories for years to come. Video Booths 360 is here to assist you with amazing 360 video booths that are not only affordable to cost or rent but are also less expensive when compared to buying a traditional photo booth. However, you get much more flexibility and quality, while also pushing the boundaries and immersing your guests in an entirely new and fun experience.  Here at Video Booths 360, we supply platforms to the whole of the UK and worldwide!   Why not call the team to start your new business today!",
		is_new: true,
		sale_price: 300000,
		sale_discount_price: 10000,
		rentable: true,
		rent_price: 10000,
		rent_period: "hr",
		rent_discount_price: 0,
		image: "/img/booth/360 booth 6.jpg",
		other_images: [
			"/img/booth/360 booth 2.jpg",
			"/img/booth/360 booth 11.jpg",
			"/img/booth/360 booth 4.jpg",
			"/img/booth/360 booth 5.jpg",
		],
		available: true,
		reviews: [],
		is_customizable: true,
		features: [
			{
				title: "Customisation ",
				description: "Choose from a range of options to suit your event "
			},
			{
				title: "Quality Control ",
				description: "All products are made to order and go through thorough testing "
			},
			{
				title: "Stepless Motor ",
				description: " "
			},
			{
				title: "Wireless Remote",
				description: "Choose from a range of options to suit your event "
			},
			{
				title: "Delivery ",
				description: "All of our 360 video booths can be shipped within 14 days"
			},
			{
				title: "1 year Guarantee",
				description: "All our products are manufactured guaranteed"
			},
		]
	},
	{
		id: 2,
		name: "Auto Hand washer",
		description: "Avoid physical contact and stay safe by using our contactless automatic hand washer.",
		long_description: "",
		is_new: true,
		sale_price: 150000,
		sale_discount_price: 0,
		rentable: false,
		rent_price: null,
		rent_period: "hr",
		rent_discount_price: null,
		image: "/img/booth/360 booth 5.jpg",
		other_images: [
			"/img/booth/360 booth 7.jpg",
			"/img/booth/360 booth 8.jpg",
			"/img/booth/360 booth 10.jpg",
		],
		available: true,
		reviews: [],
		is_customizable: true,
		features: [
			{
				title: "",
				description: "Choose from a range of options to suit your event "
			}
		]
	}
];


let product = products.filter(p => p.id == 1)[0];

const get_sale_discount_percentage = (product) => Math.trunc((product.sale_discount_price * 100) / product.sale_price);
const get_rent_discount_percentage = (product) => Math.trunc((product.rent_discount_price * 100) / product.rent_price);

const get_final_sale_price = (product) => product.sale_price - product.sale_discount_price;

const get_final_rent_price = (product) => {
	return (product.rentable) ? product.rent_price - product.rent_discount_price : 0;
}

</script>

<template>

	<SiteLayout :title="product.name">

		<template #banner>
			<div class="bg-white py-6 sm:py-8 ">
				<div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
					<p class="text-red-600 lg:text-lg font-semibold mb-2">Product Details</p>

					<h2 class="text-gray-800 text-2xl lg:text-3xl font-bold mb-4 ">{{product.name}}</h2>

					<p class="max-w-screen-md text-gray-500 md:text-lg">{{product.description}}</p>
				</div>
			</div>
		</template>

		<template #content>

			<section class="container flex flex-col  py-12 font-sans pt-0">
				<div class="  py-6 sm:py-8 lg:py-12 w-full md:w-10/12 rounded-lg mx-auto">
					<div class="w-full px-4 md:px-8 mx-auto">
						<div class="grid md:grid-cols-2 gap-8">
							<!-- images - start -->
							<div class="grid lg:grid-cols-5 gap-4">
								<div class="flex lg:flex-col order-last lg:order-none gap-4">

									<div class="bg-gray-100 rounded-lg overflow-hidden"
										v-for="(img, index) in product.other_images" v-bind:key="'other_img_' + index">
										<img :src="img" loading="lazy" :alt="product.name"
											class="w-full h-full object-cover object-center" />
									</div>

								</div>

								<div class="lg:col-span-4 bg-gray-100 rounded-lg overflow-hidden relative group">
									<img :src="product.image" loading="lazy" :alt="product.name"
										class="w-full h-full object-cover object-center" />

										<a   class="lg:hidden cursor-pointer group-hover:block p-3 duration-200 rounded-full bg-white bg-opacity-90  text-slate-800 hover:text-white hover:bg-red-700 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
										</svg>
									</a>

									<span
										class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span>
									<span v-if="product.rentable"
										class="bg-green-500 text-white text-sm tracking-wider uppercase rounded-bl-lg absolute right-0 top-0 px-3 py-1.5">rent</span>

									<a href="#"
										class="inline-block bg-transparent   focus-visible:ring ring-red-300 text-red-500 active:text-red-700 border-0 text-sm md:text-base font-semibold text-center rounded-full outline-none transition duration-100 absolute right-4 bottom-4 px-2 py-3">
										<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
											viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
										</svg>
									</a>
								</div>
							</div>
							<!-- images - end -->

							<!-- content - start -->
							<div class="md:py-8">
								<!-- name - start -->
								<div class="mb-2 md:mb-3">
									<span class="inline-block text-gray-500 mb-0.5">Design Genius</span>
									<h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">{{ product.name }}</h2>
								</div>
								<!-- name - end -->


								<!-- color - start -->
								<div class="mb-4 md:mb-6" hidden>
									<span
										class="inline-block text-gray-500 text-sm md:text-base font-semibold mb-3">Color</span>

									<div class="flex flex-wrap gap-2">
										<span
											class="w-8 h-8 bg-gray-800 border ring-2 ring-offset-1 ring-gray-800 rounded-full transition duration-100"></span>
										<button type="button"
											class="w-8 h-8 bg-gray-500 border ring-2 ring-offset-1 ring-transparent hover:ring-gray-200 rounded-full transition duration-100"></button>
										<button type="button"
											class="w-8 h-8 bg-gray-200 border ring-2 ring-offset-1 ring-transparent hover:ring-gray-200 rounded-full transition duration-100"></button>
										<button type="button"
											class="w-8 h-8 bg-white border ring-2 ring-offset-1 ring-transparent hover:ring-gray-200 rounded-full transition duration-100"></button>
									</div>
								</div>
								<!-- color - end -->

								<!-- size - start -->
								<div class="mb-8 md:mb-10" hidden>
									<span
										class="inline-block text-gray-500 text-sm md:text-base font-semibold mb-3">Size</span>

									<div class="flex flex-wrap gap-3">
										<button type="button"
											class="w-12 h-8 flex justify-center items-center bg-white hover:bg-gray-100 active:bg-gray-200 text-gray-800 text-sm font-semibold text-center border rounded-md transition duration-100">XS</button>
										<button type="button"
											class="w-12 h-8 flex justify-center items-center bg-white hover:bg-gray-100 active:bg-gray-200 text-gray-800 text-sm font-semibold text-center border rounded-md transition duration-100">S</button>
										<span
											class="w-12 h-8 flex justify-center items-center bg-red-500 text-white text-sm font-semibold text-center border border-red-500 rounded-md cursor-default">M</span>
										<button type="button"
											class="w-12 h-8 flex justify-center items-center bg-white hover:bg-gray-100 active:bg-gray-200 text-gray-800 text-sm font-semibold text-center border rounded-md transition duration-100">L</button>
										<span
											class="w-12 h-8 flex justify-center items-center bg-white text-gray-400 text-sm font-semibold text-center border border-transparent rounded-md cursor-not-allowed">XL</span>
									</div>
								</div>
								<!-- size - end -->

								<!-- price - start -->
								<div class="mb-4">
									<div class="flex items-end gap-2">
										Sale Price
										<span class="text-gray-800 text-xl md:text-lg font-bold font-sans">
											{{ get_final_sale_price(product) }} F CFA</span>
										<span v-if="product.sale_discount_price > 0"
											class="text-red-500 line-through mb-0.5 font-sans"> {{ product.sale_price }}
											F
											CFA</span>
									</div>
									<div v-if="product.rentable" class="flex items-end gap-2">
										Rental Price :
										<span class="text-gray-800 text-xl md:text-lg font-bold font-sans">
											{{ get_final_rent_price(product) }} F CFA</span>
										<span v-if="product.rent_discount_price > 0"
											class="text-red-500 line-through mb-0.5 font-sans"> {{ product.rent_price }}
											F
											CFA</span>
									</div>

									<span class="text-gray-500 text-sm">incl. VAT</span>
								</div>
								<!-- price - end -->

								<!-- shipping notice - start -->
								<div class="flex items-center text-gray-500 gap-2 mb-6">
									<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
										viewBox="0 0 24 24" stroke="currentColor">
										<path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
									</svg>

									<span class="text-sm">1-4 day shipping <small>(*can vary depending on your
											location)</small></span>
								</div>
								<!-- shipping notice - end -->

								<!-- buttons - start -->
								<div class="flex gap-2.5">
									<a href="/contact"
										class="inline-block flex-1 sm:flex-none bg-red-500 hover:bg-red-600 active:bg-red-700 focus-visible:ring ring-red-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Buy
										now</a>

									<a href="/contact"
										class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-red-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Rent
										now</a>
								</div>
								<!-- buttons - end -->
							</div>
							<!-- content - end -->
						</div>
					</div>
				</div>
				<div class="bg-gray-100 p-6 sm:p-8 lg:p-12 w-full md:w-10/12 rounded-lg mx-auto my-3">
					<h3 class="font-bold text-red-600 mb-4 ">More Information</h3>
					<div class="py-2">

						{{ product.long_description }}
					</div>

					<div id="features" class="mt-5 ">

						<div class=" flex mx-auto lg:flex-row">
							<div
								class=" px-6 py-8 space-y-6 rounded-lg sm:p-8 lg:p-12 w-full bg-red-700 text-gray-50 text-left">
								<p class="text-xl">Features</p>
								<div class="flex space-x-2 sm:space-x-4" v-for="(feature, index ) in product.features"
									:key="'product_feature_' + index">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										stroke="currentColor" class="flex-shrink-0 w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
										</path>
									</svg>
									<div class="space-y-2">
										<p class="text-lg font-medium leading-snug">{{ feature.title }}</p>
										<p class="leading-snug">{{ feature.description }}</p>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>
			</section>


		</template>
	</SiteLayout>

</template>


<style>
</style>
