<template>
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
</template>

<script setup>
	defineProps({
		

    icon: {
        type: String,
    },
    title: {
        type: String,
        default: 'Add a title',
    },
    description: {
        type: String,
        default: 'Add a description',
    },
    bgFrom: {
        type: String,
        default: 'black',
    },
    bgVia: {
        type: String,
        default: 'via-red-600',
    },
    bgTo: {
        type: String,
        default: 'black',
    },
});
</script>

<style>

</style>