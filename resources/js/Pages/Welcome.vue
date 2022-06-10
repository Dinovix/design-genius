<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
	canLogin: Boolean,
	canRegister: Boolean,
	laravelVersion: String,
	phpVersion: String,
});
</script>

<template>

	<Head title="Home - Design Genius" />

	<!-- ==== Header ==== -->

	<header>
		<nav class="fixed z-20 w-full">
			<div class="container m-auto px-6 md:px-12 lg:px-6">
				<div class="flex flex-wrap items-center justify-between py-6 gap-6 md:py-4 md:gap-0">
					<div class="w-full flex justify-between lg:w-auto">
						<a href="#" aria-label="logo">
							<img src="img/logo.png" class="w-24" alt="Design Genius logo">
						</a>

						<button aria-label="humburger" id="hamburger" class="relative w-10 h-10 -mr-2 lg:hidden">
							<div aria-hidden="true" id="line"
								class="inset-0 w-6 h-0.5 m-auto rounded bg-white transition duration-300"></div>
							<div aria-hidden="true" id="line2"
								class="inset-0 w-6 h-0.5 mt-2 m-auto rounded bg-white transition duration-300"></div>
						</button>
					</div>

					<div hidden
						class="w-full bg-white md:space-y-0 md:p-0 md:flex-nowrap md:bg-transparent lg:w-auto lg:flex">
						<div class="block w-full lg:items-center lg:flex">
							<ul
								class="space-y-6 pb-6 tracking-wide font-medium text-gray-100 lg:pb-0 lg:pr-6 lg:items-center lg:flex lg:space-y-0">

								<li>
									<Link :href="route('login')" class="text-sm text-white font-semibold block md:px-3">
									Services
									</Link>

								</li>
								<li>
									<Link :href="route('login')" class="text-sm text-white font-semibold block md:px-3">
									Products
									</Link>

								</li>
								<li>
									<Link :href="route('login')" class="text-sm text-white font-semibold block md:px-3">
									Blog
									</Link>

								</li>
								<li>
									<Link :href="route('login')" class="text-sm text-white font-semibold block md:px-3">
									Academy
									</Link>

								</li>
								<li>
									<Link :href="route('login')" class="text-sm text-white font-semibold block md:px-3">
									Affiliates
									</Link>

								</li>

							</ul>

							<ul
								class="border-t space-y-2   lg:space-y-0 lg:space-x-2 lg:pt-0 lg:pl-1 lg:border-t-0 lg:border-l lg:items-center md:flex">
								<div v-if="canLogin" class="hidden   sm:flex scale-90">


									<li v-if="$page.props.user" >
										<Link :href="route('profile')"
										class="text-sm text-gray-700 underline">
										{{ $page.props.user.name }}
										</Link>
									</li>


									<template v-else>

										<li >
											<Link :href="route('login')"
												class="inline-block w-full py-2 px-4 rounded-md text-center transition border border-transparent active:border-red-400 sm:w-max">
												<span class="block text-white font-semibold">
													Login
												</span>
											</Link>
										</li>
										<li >
										<Link v-if="canRegister" :href="route('register')"
											class="inline-block w-full py-3 px-6 rounded-lg text-center transition bg-white active:bg-red-200 focus:bg-red-100 sm:w-max">
											<span class="block text-sm text-red-600 font-semibold">
												Register
											</span>
										</Link>
										</li>
									</template>
								</div>



							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div class="relative min-h-screen">


		<video autoplay loop muted
		class="absolute inset-0 w-full h-full object-cover object-top">
			<source src="vid/print.mp4#t=40" type="video/mp4" />
			Your browser does not support the video tag.
		</video>

		<!-- <img class="absolute inset-0 w-full h-full object-cover object-top" src="img/print.gif" alt=""> -->
		<div aria-hidden="true" class="absolute inset-0 w-full h-full bg-gradient-to-b from-black  via-red-600 to-transparent   bg-opacity-70 backdrop-blur-sm">
		</div>
		<div class="relative container m-auto py-0 px-6 md:px-12 lg:px-6">
			<div class="mb-6 pt-40 space-y-16 md:mb-20 md:pt-56 lg:w-8/12 lg:mx-auto">
				<h1 class="text-white text-center text-3xl font-bold sm:text-4xl  md:text-5xl pb-0 mb-0">
					We boost  competitiveness through high-quality design and manufacturing solutions<br/>
					<span class="text-black  text-center  text-base font-serif leading-none  ">
					Designing the future
				</span>
				</h1>


			</div>

			<div class="pb-16 hidden">
				<div class="md:px-12">
					<span class="block text-center font-medium text-pink-50">Trusted by the best</span>

					<div class="mt-8 -mx-6 px-6 overflow-x-auto md:overflow-x-hidden">
						<div class="w-max flex justify-center flex-wrap items-center gap-4 md:w-auto md:gap-6 lg:gap-8">
							<div class="flex items-center">
								<img class="w-36 grayscale contrast-200 brightness-200"
									src="https://tailus.io/images/clients/microsoft.png" alt="partner logo" loading="lazy" width="584"
									height="122">
							</div>
							<div class="flex items-center">
								<img class="w-28 grayscale contrast-200 brightness-200" src="https://tailus.io/images/clients/grabyo.png"
									alt="partner logo" loading="lazy" width="400" height="219">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="flex justify-center items-center space-x-6">
				<Link v-if="canRegister" :href="route('register')"
											class="inline-block w-full py-2 px-6 rounded-lg text-center transition border-2 border-white text-white hover:text-red-600 hover:bg-red-100  sm:w-max">

												Be an Affiliate
										</Link>
										<Link v-if="canRegister" :href="route('register')"
											class="inline-block w-full py-2 px-6 rounded-lg text-center transition bg-white active:bg-red-200 hover:bg-red-600 hover:text-white hover:shadow-md focus:bg-red-100 sm:w-max">

												Our Products

										</Link>
			</div>

			<lottie-player class="absolute left-1/2 top-full -translate-x-1/2 " src="https://assets1.lottiefiles.com/packages/lf20_jfchliut.json"  background="transparent"  speed="1"  style="width: 300px; height: 200px;"  loop  autoplay></lottie-player>
		</div>

	</div>

	<!-- ==== ! Header ==== -->


	<div class="container">
		Lollipop
	</div>



</template>

<style scoped>
</style>
