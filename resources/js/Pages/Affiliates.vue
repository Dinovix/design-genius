<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';
import Button from '@/Pages/Website/Components/Button.vue';


const how_it_works  = [
	{
		title: "Share Referral Link",
		description: "Affiliates promote DesignGenius’s products with referral links on their own web page."
	},
	{
		title: "Generate Sales",
		description: "People click the referral links, get directed to DesignGenius' website and generate sales within 30 days."
	},
	{
		title: "Earn Commissions",
		description: "Affiliates earn 5-8% of sales amount as commission for each sale generated through their referral link ."
	}
]

</script>

<template >

	<SiteLayout title="Become an affiliate">

		<template #banner>
			<div class="container px-8 md:px-12 xl:max-w-5xl mx-auto lg:px-7 xl:px-0">
				<div class="md:flex md:gap-12 pt-40 lg:py-20">
					<div class="md:w-8/12 scale-110 h-auto md:pt-8 md:mr-auto">

						<h1 class="text-gray-900 font-bold text-4xl xl:text-5xl">
							Join the move and become <span class="text-red-600">an Affiliate.</span>
						</h1>

						<p class="my-8 text-gray-700 font-poppins ">
							Earn money without having to actually sell anything! You don't even need a website! Earning money is so easy with our affiliate program.
						</p>

						<div class="flex mt-8">

							<Button :href="route('web.products')" styleClass=" scale-95" type="link">
								Start Earning Now
						</Button>

						<a href="#how_it_work" class="inline-flex items-center px-4 py-2  border border-transparent rounded-md  text-base hover:text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition scale-95 bg-transparent text-slate-800 border-slate-900" >
							How It Works
						</a>

						</div>

					</div>

				</div>
			</div>

		</template>

		<template #content>


			<section class="text-gray-600 body-font" id="how_it_work">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-11/12 mx-auto mb-20">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">How Our Affiliate Program Works</h1>
        <div class="h-1 w-20 bg-red-500 rounded"></div>
      </div>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-500 font-poppins text-sm"> Promote <b>DesignGenius</b> products on your website, blog, social media or any online location and receive commission on any sales you successfully refer.</p>
    </div>
    <div class="flex flex-wrap -m-4  w-10/12 mx-auto ">
      <div class="md:w-1/3 sm:w-full p-4 group" v-for="(h, index) in how_it_works" :key="index+'-reason'">
        <div class="bg-gray-100 p-6 rounded-lg">
          <h3 class="tracking-widest text-red-500 text-xs font-medium title-font font-mono">{{ '0'+(index+1) }}</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4 group-hover:text-red-600">{{ h.title}}</h2>
          <p class="leading-relaxed text-base font-poppins">
			{{ h.description }}
		  </p>
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
