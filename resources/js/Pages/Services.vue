<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';
import Button from '@/Pages/Website/Components/Button.vue';

const servicesList = [
	{
		label: "PRODUCT DESIGN & Engineering",
		short_description: "",
		description: "We Develop Innovative and beautiful Product that are Manufacturable and meet our Clients Business needs. We help our clients by transforming their ideas into a Professional, tangible, Productive Product.",
	},
	{
		label: "Prototyping and testing",
		short_description: "",
		description: "We Build and test the product to make sure it meets users requirement for a better experience and Quality.",
	},
	{
		label: "Manufacturing Support",
		short_description: "",
		description: "We can setup a production unit for your product, access to a supply chain network for ease, and high quality Production.",
	},
	{
		label: "MARKETING Services",
		short_description: "",
		description: "We help you go to the market FAST, planning and also market research, Competitive Analysis and Brain storming with User.",
	}
]


</script>

<template>

	<SiteLayout title="Our Services">

		<template #banner>

			<div class="container px-8 md:px-12 xl:max-w-5xl mx-auto lg:px-7 xl:px-0">
				<div class="md:flex md:gap-12 pt-40 lg:py-40">
					<div class="md:w-6/12 scale-110 h-auto md:pt-8 md:mr-auto">

						<h1 class="text-gray-900 font-bold text-4xl xl:text-5xl">
							Build in your way but with our <span class="text-red-600">Experts Support.</span>
						</h1>

						<p class="mt-8 mb-8 text-gray-700 font-poppins text-sm">
							We make use of Computerized Numerical Control (CNC) systems, Robotics, Internet of
							Things (IoT) and Artificial Intelligence technologies to optimize <b>efficiency</b> of each
							machines we produce for our customers.
						</p>

						<Button href="/contact" styleClass="mt-8" type="link">
							Book our service now
						</Button>

					</div>
					<div
						class="bg mt-12 h-48 mr-0 md:-mr-24 overflow-hidden sm:h-72 md:h-auto md:mt-0 lg:mr-0 lg:-mt-12 md:w-6/12 p-12">
						<img class="hidden md:block" src="svg/3d_service.svg" alt="3D Modeling Illustration">
					</div>
				</div>
			</div>

		</template>

		<template #content>

			<div class="container mx-auto md:w-10/12 ">

				<!-- What We Do -->
				<section class=" w-100" id="whyus">
					<div class="py-16 bg-red-50 overflow-hidden w-100 rounded-lg">
						<div class="container text-center mx-auto px-6 space-y-8 md:px-12 lg:px-20 w-100">
							<div>
								<span
									class="block w-max mx-auto py-2 px-4 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
									What We Do
								</span>
								<h2 class="mt-4 text-center text-3xl text-red-600 font-bold md:text-4xl mb-8">
									Our Core Services
								</h2>
							</div>

							<div class="font-poppins text-gray-600 text-justify ">
								<p>
									At Design Genius, we boost the competitiveness of African companies through
									provision of
									design and manufacturing solutions that help reduce production time, minimize human
									error
									while ensuring the security of workers hence increasing productivity.
								</p>
								<p hidden aria-hidden="true">The machines designed and built by our super competent
									engineering team
									benefits several sectors such as agricultural, food processing and entertainment
									sectors
									throughout Africa.
								</p>

							</div>


							<section class="text-gray-600 body-font text-left">
								<div class="container flex flex-wrap px-0 py-6 mx-auto items-center">
									<div
										class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
										<h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
											Your <em class="text-red-700">growth</em> means a lot to us !
										</h1>
										<p class="leading-relaxed  font-poppins text-sm">
											We help our clients save time needed to build a <mark>product design</mark>
											team either for the
											development of new or existing products and take their products to the
											market in no time
											through our following services;
										</p>
										<Link href="/contact" class="text-red-600 inline-flex items-center mt-4">
										Let's Talk About Your Project
										<svg fill="none" stroke="currentColor" stroke-linecap="round"
											stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
											viewBox="0 0 24 24">
											<path d="M5 12h14M12 5l7 7-7 7"></path>
										</svg>
										</Link>
									</div>
									<div class="flex flex-col md:w-1/2 md:pl-3">
										<!-- <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">
											CATEGORIES</h2> -->

										<div class="flex flex-wrap">
											<div class="py-1 w-full" v-for="(service , index) in servicesList" v-bind:key="'service-'+ index">

												<div
													class="flex rounded-lg h-min bg-gradient-to-r hover:bg-gradient-to-bl scale-90 hover:scale-95 duration-200 from-red-600 to-red-900 p-4 flex-col">
													<div class="flex items-center mb-3">
														<div
															class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-slate-50 text-slate-800 flex-shrink-0">
															<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
															<path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
															<path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
															</svg>
														</div>
														<h2 class="text-white text-lg title-font font-medium uppercase">
															{{ service.label }}
														</h2>
													</div>
													<div class="flex-grow">
														<p class="leading-relaxed text-sm font-poppins text-slate-50">
															{{ service.description }}
														</p>
														<a href="/contact" class="mt-3 text-yellow-300 inline-flex items-center">Contact us
															<svg fill="none" stroke="currentColor"
																stroke-linecap="round" stroke-linejoin="round"
																stroke-width="2" class="w-4 h-4 ml-2"
																viewBox="0 0 24 24">
																<path d="M5 12h14M12 5l7 7-7 7"></path>
															</svg>
														</a>
													</div>
												</div>


											</div>
										</div>

									</div>
								</div>
							</section>
						</div>
					</div>
				</section>


				<section>

					<div class="bg-white py-6 sm:py-8 lg:py-12 my-12">
						<div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
							<div
								class="md:h-80 flex flex-col sm:flex-row bg-gradient-to-t md:bg-gradient-to-r from-red-600 to-black rounded-lg overflow-hidden">
								<!-- content - start -->
								<div class="w-full sm:w-1/2 flex flex-col p-4 sm:p-8">
									<h2 class="text-white text-xl md:text-2xl lg:text-4xl font-bold mb-4">
										One-time Discount <br /> Up to <b class="text-yellow-300">20% </b> off.
									</h2>

									<p class="max-w-md text-gray-100 mb-8 font-poppins">
										Don't miss this unique opportunity,
										take advantage of this discount to tell us about your project. Our team can't
										wait to work on it !
									</p>
									<div class="mt-auto">
										<Link href="/contact?code=3DGENIUS22"
											class="inline-block bg-white hover:bg-gray-900 active:bg-gray-200 focus-visible:ring ring-red-300 text-red-600 hover:text-white text-sm md:text-base font-semibold text-center rounded-md outline-none transition duration-100 px-6 py-2">
										Redeem now
										</link>
									</div>
								</div>
								<!-- content - end -->

								<!-- image - start -->
								<div class="w-full sm:w-1/2  h-48 sm:h-auto order-first sm:order-none bg-gray-700">
									<img src="https://images.unsplash.com/photo-1642493815444-2ff4c30dbee8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8?auto=format&q=75&fit=crop&crop=top&w=1000&h=500"
										loading="lazy" alt="Photo by Dom Hill"
										class="w-full h-full object-cover object-center" />
								</div>
								<!-- image - end -->
							</div>
						</div>
					</div>

				</section>

			</div>

		</template>

	</SiteLayout>

</template>


<style scoped>
.bg {
	background-color: #ffffff;
	background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233f3f3f' fill-opacity='0.12'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>
