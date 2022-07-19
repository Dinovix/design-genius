<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>

<template>
	<div class="relative min-h-screen">
					<video autoplay loop muted   class="absolute inset-0 w-screen h-screen object-cover object-top" >
					<source src="https://youtu.be/M7nG-ZCc-OQ" type="video/mp4" />
						<!--  360p -->
						<!-- <source src="https://vod-progressive.akamaized.net/exp=1658119178~acl=%2Fvimeo-prod-skyfire-std-us%2F01%2F4656%2F28%2F723284532%2F3355082707.mp4~hmac=2ddba2ab78fc35705eb63a5aacd95c953b99a1e14fc33c1577ec2f255b48503e/vimeo-prod-skyfire-std-us/01/4656/28/723284532/3355082707.mp4" type="video/mp4" /> -->
						<!-- 720p  -->
						<!-- <source src="https://vod-progressive.akamaized.net/exp=1658119178~acl=%2Fvimeo-prod-skyfire-std-us%2F01%2F4656%2F28%2F723284532%2F3355082689.mp4~hmac=c8373e05eb4f7e0e5c0fbeb9024bb225bfba22badb219670687106ff6f62fab6/vimeo-prod-skyfire-std-us/01/4656/28/723284532/3355082689.mp4" type="video/mp4" /> -->
						<!-- <source src="vid/print.mp4#t=40" type="video/mp4" />	 -->
						Your browser does not support the video tag.
					</video>
					<!-- <iframe class="absolute inset-0 w-screen h-scren object-cover object-top" src="https://player.vimeo.com/video/723284532?h=9b100b558a&autoplay=1&loop=1&title=0&byline=0&portrait=0" frameborder="0" allow="autoplay; fullscreen;muted" allowfullscreen></iframe> -->

					<!-- <img class="absolute inset-0 w-full h-full object-cover object-top" src="img/print.gif" alt=""> -->
					<div aria-hidden="true"
						class="absolute inset-0 w-full h-full bg-gradient-to-b from-black  via-red-600 to-transparent   bg-opacity-70 backdrop-blur-sm">
					</div>
					<div class="relative container m-auto py-0 px-6 md:px-12 lg:px-6">
						<div class="mb-6 pt-40 space-y-16 md:mb-20 md:pt-56 lg:w-8/12 lg:mx-auto">
							<h1 class="text-white text-center text-3xl font-bold sm:text-4xl  md:text-5xl pb-0 mb-0">
								We boost competitiveness through high-quality design and manufacturing solutions<br />
								<span class="text-black  text-center  text-base font-serif leading-none  ">
									Designing the future...
								</span>
							</h1>


						</div>

						<div class="pb-16 " v-if="false">
							<div class="md:px-12">
								<span class="block text-center font-medium text-pink-50">Trusted by the best</span>

								<div class="mt-8 -mx-6 px-6 overflow-x-auto md:overflow-x-hidden">
									<div
										class="w-max flex justify-center flex-wrap items-center gap-4 md:w-auto md:gap-6 lg:gap-8">
										<div class="flex items-center">
											<img class="w-36 grayscale contrast-200 brightness-200"
												src="https://design genius.io/images/clients/microsoft.png"
												alt="partner logo" loading="lazy" width="584" height="122">
										</div>
										<div class="flex items-center">
											<img class="w-28 grayscale contrast-200 brightness-200"
												src="https://design genius.io/images/clients/grabyo.png"
												alt="partner logo" loading="lazy" width="400" height="219">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="flex justify-center items-center space-x-6">
							<Link  href="/affiliates"
								class="inline-block w-full py-2 px-6 rounded-lg text-center transition border-2 border-white text-white hover:text-red-600 hover:bg-red-100  sm:w-max">

							Become an Affiliate
							</Link>
							<Link  href="/products"
								class="inline-block w-full py-2 px-6 rounded-lg text-center transition bg-white active:bg-red-200 hover:bg-red-600 hover:text-white hover:shadow-md focus:bg-red-100 sm:w-max">

							Our Products

							</Link>
						</div>

						<a href="#whyus">
							<lottie-player class="absolute left-1/2 top-full -translate-x-1/2 "
								src="https://assets1.lottiefiles.com/packages/lf20_jfchliut.json"
								background="transparent" speed="1" style="width: 300px; height: 200px;" loop autoplay>
							</lottie-player>
						</a>
					</div>

				</div>
</template>
