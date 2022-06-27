<script setup>
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';


</script>

<template>

	<SiteLayout title="Contact Us">

		<template #banner>

			<div class="container px-8 md:px-12 xl:max-w-5xl mx-auto lg:px-7 xl:px-0">
				<div class="md:flex   pt-20 ">
					<div class="md:w-6/12 scale-110 h-auto md:pt-8 md:mr-auto">

						<h1 class="text-gray-900 font-bold text-4xl xl:text-5xl">
							Get <span class="text-red-600">in touch</span> with us !
						</h1>


					</div>
				</div>
			</div>

		</template>

		<template #content>
			<section class="w-full text-gray-600 body-font relative  px-8 md:px-12 ">
				<form class=" p-6 w-full mx-auto flex flex-row-reverse justify-between">
					<div
						class="w-full md:w-5/12
						 bg-gray-300 rounded-lg overflow-hidden sm:ml-auto p-10 flex items-end justify-start relative">

							<iframe
							class="absolute inset-0" style="filter: grayscale(1) contrast(1.2) opacity(0.4);border:0;"
							src="https://www.google.com/maps/embed?width=100%&amp;height=700&amp;hl=en&amp;q=DesignGenius+(Your%203D%20Printing%20Partner)&amp;pb=!1m18!1m12!1m3!1d254777.90505799188!2d11.23981674050273!3d3.830605276177873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf7a309a7977%3A0x7f54bad35e693c51!2zWWFvdW5kw6k!5e0!3m2!1sfr!2scm!4v1656337537728!5m2!1sfr!2scm"
							width="100%"
							height="100%"
							allowfullscreen=""
							loading="lazy"
							referrerpolicy="no-referrer-when-downgrade">
							</iframe>
						<div class="bg-white relative flex flex-wrap py-6 rounded shadow-md font-poppins">
							<div class=" px-6">
								<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
								<p class="mt-1 font-sans">Yaounde, Cameroun</p>
							</div>
							<div class=" px-6 mt-4 ">
								<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
								<a class="text-red-600 leading-relaxed font-sans">info@mydesigngenius.com</a>
								<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE
								</h2>
								<p class="leading-relaxed font-sans">+237 6 80 65 19 80</p>
							</div>
						</div>
					</div>
					<div class="w-full md:w-7/12  bg-white flex flex-col  m-8 md:mt-0">
						<p class="leading-relaxed mb-5 text-gray-600 font-poppins">We are glad to here from you !</p>
						<div class="form-group flex space-x-2 my-4">
								<div class="relative  md:w-1/2">
									<label for="first_name" class="leading-7 text-sm text-gray-600">First name</label>
								<input type="text" id="first_name" name="first_name"
									class="w-full bg-white rounded border border-gray-300 focus:border-red-600 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
							</div>
							<div class="relative  md:w-1/2">
								<label for="last_name" class="leading-7 text-sm text-gray-600">Last name</label>
								<input type="text" id="last_name" name="last_name"
									class="w-full bg-white rounded border border-gray-300 focus:border-red-600 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
						</div>
						</div>
						<div class="relative mb-4">
							<label for="email" class="leading-7 text-sm text-gray-600">Email*</label>
							<input type="email" id="email" name="email" placeholder="Enter your email address" required
								class="w-full bg-white rounded border border-gray-300 focus:border-red-600 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
						</div>
						<div class="relative mb-4">
							<label for="message" class="leading-7 text-sm text-gray-600">Message*</label>
							<textarea id="message" name="message" placeholder="Tell us more here..." required
								class="w-full bg-white rounded border font-poppins text-sm border-gray-300 focus:border-red-600 focus:ring-2 focus:ring-red-200 h-32  outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
						</div>
						<button type="submit"
							class="text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Send</button>
						<p class="text-sm text-gray-600 mt-3">
							Please make sure you include every details about your request, we'll get back to you within the next 24 working hours.
						</p>
					</div>
				</form>
			</section>
		</template>
	</SiteLayout>

</template>

