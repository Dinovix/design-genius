<script setup>
import SiteLayout from '@/Pages/Website/Layouts/SiteLayout.vue';

const team = [
	// {
	// 	first_name: "AGBOR",
	// 	last_name: "E. Ransome",
	// 	picture_url: "/img/team/agbor.png",
	// 	title: "Founder / CEO",
	// 	quote: "Designing the future...",
	// 	social_links: {
	// 		fb: "https://www.facebook.com/Design-Genius-266925227331326",
	// 		ln: "https://www.linkedin.com/company/71091584",
	// 		tw: null
	// 	}
	// },
	{
		first_name: "Habass Tiemuncho",
		last_name: "",
		picture_url: "/img/team/habass.png",
		title: "Head of operation",
		quote: "In charge of operations and process development",
		social_links: {
			fb: "https://www.facebook.com/Design-Genius-266925227331326",
			ln: "https://www.linkedin.com/company/71091584",
			tw: null
		}
	},
	{
		first_name: "Momo",
		last_name: "Sadoh",
		picture_url: "/img/team/momo.png",
		title: "Chief automation Engineer",
		quote: "In charge of Robotics , Electronics , IoT",
		social_links: {
			fb: "https://www.facebook.com/Design-Genius-266925227331326",
			ln: "https://www.linkedin.com/company/71091584",
			tw: null
		}
	},
	{
		first_name: "Kouamo",
		last_name: "Franklin",
		picture_url: "/img/team/kouamo.png",
		title: "Chief Mechanical Engineer",
		quote: "In charge of Mechanical Product Design, Prototyping and Manufacturing",
		social_links: {
			fb: "https://www.facebook.com/Design-Genius-266925227331326",
			ln: "https://www.linkedin.com/company/71091584",
			tw: null
		}
	},
	{
		first_name: "Neba",
		last_name: "Cornelius",
		picture_url: "/img/team/neba.png",
		title: "Mechanical engineer/Head of Production",
		quote: "Head of Production Responsible for Production",
		social_links: {
			fb: "https://www.facebook.com/Design-Genius-266925227331326",
			ln: "https://www.linkedin.com/company/71091584",
			tw: null
		}
	},
]

</script>

<template>

	<SiteLayout>

		<template #banner>

			<div class="bg-white py-12 sm:py-8 lg:py-16">
				<div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
					<div class="bg-gray-100 rounded-lg px-4 py-6 md:py-8 lg:py-12">
						<p class="text-red-500 lg:text-lg font-semibold text-center mb-2 md:mb-3">About Design Genius
						</p>

						<h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">
							We are designing the future.
						</h2>

						<p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">
							Becoming Africa’s leading design and manufacturing company, We facilitate innovation by
							easing the
							development of new products on the African market hence developing our continent and
							designing the future.</p>
					</div>
				</div>
			</div>

		</template>
		<template #content>

			<section class="flex flex-col container md:w-10/12 px-4 md:px-8 mx-auto">


				<div class="flex bg-transparent py-6 sm:py-8 lg:py-12">
					<div class="  ">
						<section>
							<div class="grid md:grid-cols-2 gap-8 lg:gap-12">
								<div class="h-full flex place-items-center">
									<div class="h-auto col-4/12 bg-gray-100 overflow-hidden rounded-lg shadow-lg">
										<img src="/img/team/agbor_dg.jpg" loading="lazy"
											alt="Photo by DesignGenius Team"
											class="w-full h-full object-cover object-center" />

										<caption class=" w-full text-red-600 text-sm">
											CEO / Founder of Design Genius
										</caption>
									</div>


								</div>

								<div class="">
									<p class="text-red-500 font-bold text-center md:text-left">Who we are</p>

									<h2
										class="text-gray-800 text-xl sm:text-2xl font-semibold text-center md:text-left mb-2 md:mb-4">
										Long story short
									</h2>
									<p class="text-gray-600  mb-6 md:mb-8 text-justify font-poppins">
										Passionate about engineering design, our founder, <b class="text-black">Eng.
											Agbor Edouard Ransome </b>in 2018
										would design and build machines for graduating student’s projects. Realizing
										that his
										skill
										was needed, yeah, making some money out of the services rendered too led him to
										thinking
										about doing this thing big hence the birth of Design Genius.

										<br class="mb-2" />
										In 2019, he built a team of
										5
										persons (including himself) with the same passion for the application of
										scientific
										knowledge
										in solving technical problems and Design Genius kicked off mainly offering
										engineering
										design services to graduating students through trainings on design and designing
										and
										manufacturing services.
									</p>
								</div>
							</div>

							<br class="mb-2" />
							<div class="font-poppins">

								An idea from a bedroom to a dynamic team of individuals
								designing
								and building their first automatic hand washing machine after the covid-19 outbreak, a
								cassava processing truck at FABLAB and landing an international design contract
								designing
								an automatic food dispenser in Ghana all in the same year (2019) Design Genius
								<u>launched in 2022</u> with its physical location at Bonaberi, Douala CAMEROON and at
								the same
								introducing new products to its market.
							</div>
						</section>



						<div class="container mx-auto  pt-24" hidden>
							<h1 class="text-red-600 text-2xl sm:text-3xl  text-center md:text-left mb-4 md:mb-6">
								Our Competitive Advantage</h1>

							<p class="text-gray-500  mb-6 md:mb-8  text-justify">

								At Design Genius, we boost the competitiveness of African companies through provision of
								design and manufacturing solutions that help reduce production time, minimize human
								error
								while ensuring the security of workers hence increase productivity. All of this made
								possible by
								the use of Computerized Numerical Control (CNC) systems, Robotics, Internet of Things
								(IoT) and Artificial Intelligence technologies to optimize efficiency of produced
								machines.
								The machines designed and built by our super competent engineering team benefits several
								sectors such as agricultural, food processing and entertainment sectors throughout
								Africa.
								<br class="mb-2" />
								We helping our clients save time needed to build a product design team either for the
								development of new or existing products and take their products to the market in no time
								through our product design and manufacturing services, prototyping and testing,
								marketing support.

								<br class="mb-2" />
								At Design Genius, we enable people of all ages acquire technological skills and become
								valuable
								in the job market of today’s technologically advanced world by providing trainings on
								technology like design engineering and building, app development etc...
							</p>
						</div>
					</div>
				</div>

				<!--  Our Team -->
				<section class="text-gray-600 body-font">
					<div class=" px-5 py-24 mx-auto">
						<div class="flex flex-col text-center w-full mb-20">
							<h1 class="text-2xl  mb-4 text-red-600 tracking-widest">OUR TEAM</h1>
							<p class="mx-auto leading-relaxed  font-poppins">
								As a team, we commit ourselves to continuously improving our processes to enhance
								quality of our machines, providing defect-free products on time with quality customer
								care and service.
								<br>
								<b>Our core values : </b>

								<span
									v-for='(cv, index) in ["Teamwork", "Respect", "Continuous Improvement and Integrity", "Quality policy"]'
									v-bind:key="'core_value_' + index"
									class=" bg-red-400 bg-opacity-20 text-red-700 p-2 py-1 rounded-full mx-1 text-xs">
									{{ cv }}
								</span>
							</p>
						</div>
						<div class="flex flex-wrap -m-4">
							<div class="p-4 lg:w-1/2" v-for="(staff, index) in team" v-bind:key="'memeber-' + index">
								<div
									class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left   ">
									<img alt="team" width="150" height="150" loading="lazy"
										class="flex-shrink-0 rounded-full   object-cover object-center sm:mb-0 mb-4  grayscale hover:grayscale-0 scale-95 hover:scale-100 duration-150"
										v-bind:src="staff.picture_url">
									<div class="flex-grow sm:pl-8">
										<h2 class="title-font font-bold  text-black font-poppins">{{ staff.first_name + " " + staff.last_name}}</h2>
										<h3 class="text-red-600  mb-3">{{ staff.title }}</h3>
										<p class="mb-4"> {{ staff.quote }}</p>
										<span class="inline-flex">

											<a class="text-gray-500 hover:text-red-600" v-if="(staff.social_links.fb)"
												v-bind:href="staff.social_links.fb" target="_blank">
												<svg fill="none" stroke="currentColor" stroke-linecap="round"
													stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
													viewBox="0 0 24 24">
													<path
														d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
													</path>
												</svg>
											</a>
											<a class="ml-2 text-gray-500 hover:text-red-600"
												v-if="(staff.social_links.tw)" v-bind:href="staff.social_links.tw"
												target="_blank">
												<svg fill="none" stroke="currentColor" stroke-linecap="round"
													stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
													viewBox="0 0 24 24">
													<path
														d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
													</path>
												</svg>
											</a>
											<a class="ml-2 text-gray-500 hover:text-red-600"
												v-if="(staff.social_links.ln)" v-bind:href="staff.social_links.ln"
												target="_blank">
												<svg fill="none" stroke="currentColor" stroke-linecap="round"
													stroke-linejoin="round" stroke-width="2" class="w-5 h-5 border-0"
													viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
													<title>LinkedIn</title>
													<path
														d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
												</svg>
											</a>
										</span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>

			</section>

		</template>
	</SiteLayout>

</template>


<style>
</style>
