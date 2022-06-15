<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';
import HeroHeader from '@/Pages/Website/Components/HeroHeader.vue';




</script>

<template>

	<SiteLayout title="Home" >

		<template #banner >
			<HeroHeader />
			</template>

		<template #content>

			<!-- WHy US -->
	<section class=" w-100" id="whyus">
		<div class="py-16 bg-red-50 overflow-hidden w-100">
			<div class="container mx-auto px-6 space-y-8 md:px-12 lg:px-20 w-100">
				<div>
					<span class="block w-max mx-auto py-2 px-4 rounded-full bg-red-100 text-red-700 text-sm font-semibold">Our Mission</span>
					<h2 class="mt-4 text-center text-3xl text-red-600 font-bold md:text-4xl mb-8">
						Forget the inconveniences that come with designing <br class="lg:block" hidden /> your favorite machines &amp; products.
						<!-- A customer-first approach to product design  &amp; manufacturing -->
					</h2>
				</div>
				<div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3  md:-mx-8">
					<div class="relative group">
						<div aria-hidden="true" class="absolute inset-0 rounded-xl bg-white shadow-2xl transition duration-300 group-hover:bg-gradient-to-br from-black via-red-600 to-black group-hover:scale-105 lg:group-hover:scale-105"></div>
						<div class="relative space-y-12 p-8 md:p-12 lg:p-8">
							<div aria-hidden="true" class="w-10 h-10 flex justify-center items-center rounded-full bg-red-100 group-hover:bg-white">
								<span class="font-bold text-red-700 ">1</span>
							</div>
							<div class="space-y-4">
								<h4 class="text-2xl text-gray-800 font-medium transition group-hover:text-white">We Make Things Easier &amp; Cheaper</h4>
								<p class="text-gray-600 group-hover:text-slate-50">We facilitate innovation, Design, Development and Manufacturing of Products for both companies and individuals.</p>
							</div>

						</div>
					</div>
					<div class="relative group">
						<div aria-hidden="true" class="absolute inset-0 rounded-xl bg-white shadow-2xl transition duration-300 group-hover:bg-gradient-to-br from-black via-red-600 to-black group-hover:scale-105 lg:group-hover:scale-105"></div>
						<div class="relative space-y-12 p-8 md:p-12 lg:p-8">
							<div aria-hidden="true" class="w-10 h-10 flex justify-center items-center rounded-full bg-red-100">
								<span class="font-bold text-red-700">2</span>
							</div>
							<div class="space-y-4">
								<h4 class="text-2xl text-gray-800 font-medium transition group-hover:text-white">Quality Work Process </h4>
								<p class="text-gray-600 group-hover:text-slate-50">We solve each problem through Engineering, Product Design, Prototyping and Testing, with Manufacturing and marketing support.</p>
							</div>

						</div>
					</div>
					<div class="relative group">
						<div aria-hidden="true" class="absolute inset-0 rounded-xl bg-white shadow-2xl transition duration-300 group-hover:bg-gradient-to-br from-black via-red-600 to-black group-hover:scale-105 lg:group-hover:scale-105"></div>
						<div class="relative space-y-12 p-8 md:p-12 lg:p-8">
							<div aria-hidden="true" class="w-10 h-10 flex justify-center items-center rounded-full bg-red-100">
								<span class="font-bold text-red-700">3</span>
							</div>
							<div class="space-y-4">
								<h4 class="text-2xl text-gray-800 font-medium transition group-hover:text-white">Best Customer Service</h4>
								<p class="text-gray-600 group-hover:text-slate-50">We do not just produce, we help you on the journey to take your product to the market as quick as possible.</p>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
<!--  ! Why us -->

<!-- Call To Action -->

<div class="py-16 bg-white">
    <div  class="container m-auto px-6 space-y-8 text-gray-500 md:px-12 lg:px-20">
        <div class="justify-center text-center gap-6 md:text-left md:flex lg:items-center  lg:gap-16">
            <div class="order-last mb-6 space-y-6 md:mb-0 md:w-6/12 lg:w-6/12">
			<span class="block w-max  py-2 px-4 rounded-full bg-red-100 text-red-700 text-sm font-semibold">Discount Offer</span>

                <h2 class="text-4xl text-gray-700 font-sans md:text-5xl ">
					Order a product design &amp;  
					benefit up to 
					<span class="text-red-600  rounded-md font-bold animate-pulse duration-150">05% off</span>
				</h2>
                <p class="font-poppins">Take advantage of this unique opportunity , we successfully produce high tech
machines at affordable prices for the African developing market. </p>
                <div class="flex flex-row-reverse flex-wrap justify-center gap-4 md:gap-6 md:justify-end">
                    <Link href="/contact" title="Order Now" class="w-full py-2 px-6 text-center rounded-md transition bg-gray-700 shadow-xl hover:bg-red-600 active:bg-gray-700 focus:bg-gray-600 sm:w-max">
                        <span class="block text-white font-semibold">
                            Order Now
                        </span>
                    </Link>
                    <Link type="button" title="more about" class="w-full order-first py-2 px-6 text-center rounded-md bg-gray-100 transition hover:bg-gray-200 active:bg-gray-300 focus:bg-gray-200 sm:w-max">
                        <span class="block text-gray-600 font-semibold">
                            Our Catalog
                        </span>
                    </Link>
                </div>
            </div>
            <!-- <div class="grid grid-cols-5 grid-rows-4 gap-4 md:w-5/12 lg:w-6/12"> -->
            <div class="block gap-4 md:w-5/12 lg:w-6/12">
                <div class="col-span-2 row-span-2 hidden">
                    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_np8ic4gc.json"  background="transparent"  speed="1"  style="width: auto;"  loop  autoplay></lottie-player>
                </div>
                <div class="col-span-3 row-span-2 hidden">
                    <img src="svg/robot_arm.svg" class="w-full h-full object-contain object-top rounded-xl"  alt="robotic arm illustration" loading="lazy">
                </div>
                <div class="col-span-2 row-span-1">
                    <img src="svg/discount.svg" class="w-3/4 h-auto object-contain object-top rounded-xl"  alt="discount illustration" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div> 
                                
<!-- !Call To Action -->


<!-- Academy -->

<div class="py-16 ">  
  <div class="container mx-auto px-6  md:w-10/12  text-gray-600 md:px-12 xl:px-6">
      <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
       
        <div class="md:7/12 lg:w-6/12">
			<span class="block w-max  py-2 px-4 mb-4 rounded-full bg-red-100 text-red-700 text-sm font-semibold" >
				Academy Free Courses 
				</span>

          <h2 class="text-2xl text-red-600 font-bold md:text-4xl"> At <b>DesignGenius</b>, we believe that <u>sharing</u> is <u>caring</u>.</h2>
          <p class="mt-6 text-gray-600 font-poppins font-light">
			  Get instant access to a vareity for design courses for <u> FREE ! </u>, go deep into the world of design with our experts,  all you need to do is create an account and youare good to go.</p>
          <p class="mt-4 mb-8 text-gray-600 font-poppins font-light"> Wether your are passionate  or simply curious about this field our experts got your back!</p>
		  
		  <Link href="#" title="Watch Now" class="min-w-max block py-2 px-6 text-center rounded-md transition bg-gray-700 shadow-xl hover:bg-red-600 active:bg-gray-700 focus:bg-gray-600 sm:w-max">
                        <span class="flex w-full text-white font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
							</svg>
							Watch Free Courses
                        </span>
                    </Link>
        </div>
		 <div class="md:5/12 lg:w-5/12">
          <!-- <img src="svg/startup.png" alt="image" loading="lazy" width="" height=""> -->
                    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_np8ic4gc.json"  background="transparent"  speed="1"  style="width: auto;"  loop  autoplay></lottie-player>

        </div>
      </div>
  </div>
</div>
                                
<!-- !Academy -->


		</template>

	</SiteLayout>






</template>