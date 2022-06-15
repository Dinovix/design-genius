		<script setup>
		import { Head, Link } from '@inertiajs/inertia-vue3';
		import SiteLayout  from '@/Pages/Website/Layouts/SiteLayout.vue';	
		import Button from '@/Pages/Website/Components/Button.vue';
		

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
							
							<p class="mt-8 mb-8 text-gray-700 font-poppins text-sm">Odio incidunt nam itaque sed eius modi error totam sit illum. Voluptas doloribus asperiores quaerat aperiam. Quidem harum omnis beatae ipsum soluta!</p>
							
							<Button href="/contact" styleClass="mt-8" type="link"> 
								Book our service now
							</Button>
						
						</div>
						<div class="bg mt-12 h-48 mr-0 md:-mr-24 overflow-hidden sm:h-72 md:h-auto md:mt-0 lg:mr-0 lg:-mt-12 md:w-6/12 p-12">
							<img class="hidden md:block" src="svg/3d_service.svg" alt="3D Modeling Illustration">
						</div>
					</div>
				</div> 

		</template>
		
		<template #content>

			<div class="container mx-auto">
				
			</div>

		</template>
		
	</SiteLayout>
  
</template>


<style scoped>
.bg{
	background-color: #ffffff;
	background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233f3f3f' fill-opacity='0.12'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>