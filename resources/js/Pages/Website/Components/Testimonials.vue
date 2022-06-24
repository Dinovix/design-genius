<script setup>
import TestimonyCard from './TestimonyCard.vue';







const testimonies =  [
				{
					testimony: "A Very discipline Team of Engineers, they are Doing a great job solving the Problem of useful and needful products for use in the African emerging Market.",
					author: "Pr. Nso Emmanuel",
					title: "Director ENSAI",
					profile: "/img/logo-min.png"
				},
				{
					testimony: "A very important Startup capable of empowering youths while solving the Problem of Unemployment",
					author: "ACHALEKE C. Leke",
					title: "Executive Director. Local Youth Corner",
					profile: "/img/logo-min.png"
				},
				{
					testimony: "A team of Very skilled and Passionate Engineers with great solution For Africa .",
					author: "Eng. Mayank Awasthi",
					title: "Founder Mechanicalnib.com , INDIA",
					profile: "/img/logo-min.png"
				},
			]



</script>

<template>

	<section class="text-gray-600 body-font container md:w-9/12 mx-auto">

		<div class="container px-5 py-24 mx-auto">
			<h2 class="text-5xl font-medium title-font text-red-600  text-center">Testimonials</h2>
			<h3 class="text-base font-poppins text-center mb-12">What people say about us</h3>
			<div class="flex flex-wrap -m-4 justify-center">


				<TestimonyCard v-for="(t, index ) in testimonies" v-bind:key="'testimony-'+index">

					<template #testimony>
						{{t.testimony}}
					</template>
					<template #author>
						{{t.author}}
					</template>
					<template #author-title>
						{{t.title}}
					</template>
					<template #author-img>
					 <img v-bind:src="t.profile" v-bind:alt="t.author" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
					</template>

				</TestimonyCard>
				<!-- <TestimonyCard
					testimony="Synth chartreuse iPhone lomo cray raw denim brunch everyday carry neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo, post-ironic heirloom try-hard pabst authentic iceland."
					author="Pr. Nso Emmanuel"
					author-title="Director ENSAI"
					author-img="/img/logo-min.png"
					/> -->


			</div>
		</div>
	</section>
</template>
