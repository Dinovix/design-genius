<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SiteLayout from "./Website/Layouts/SiteLayout.vue";

let articles = [
	{
		id: 1,
		title: "Why you should choose DesignGenius SAS as your go-to company for product design and development",
		image: "/img/dg-team.png",
		author: "Design Genius",
		category: "PRODUCT DESIGN",
		content: `Product design and development procedures are complex. They require a lot of attention to
detail and mastery of technological parameters else the entire product will be ruined.
Consequently, finding the right technicians for your design and development work must be done
with a lot of precaution. <br /><br />
DesignGenius SAS stands out as the best PanAfrican Design company because of the
following reasons:
 <br /><br />

At DesignGenius SAS multiple streams of knowledge exist. Our product design and
development prowess is a result of efficient and practically tested team work. These
combination of "genius" ideas and work ethic is the reason why you should trust us with your
project. <br /><br />
With the wave of technology traveling quickly across the world, the African market is in dire
need of innovative products and machinery at every level of society.<br /><br />
Unfortunately, the cost of importing and maintaining foreign tech products and machinery
leaves individuals and companies vulnerable to producing low quality services.Through our low
-cost-high-tech approach, DesignGenius Groupe helps companies enjoy high tech products at
a very affordable cost. Talk about a beacon of hope to you and your business.<br /><br />
In production chains across the world today, there's very little focus on product re-innovation. A
business' inability to re-innovate a product or design in this fast-changing world will see them
become obsolete and spending more on new machines. You don't want to be"classified" under
that category. Trusting DesignGenius' re-innovative design model is the best decision you'll
make for your business. This model gives you the ability to produce high quality products and
adapt to daily tech innovations without stretching your technical operation budget.<br /><br />
Trusting DesignGenius SAS with your product design and development is trusting a new and
innovative approach to technology. It's the decision you must make to day to stay relevant in
your niche`,
		created_at: new Date(),
		tags: [
			"bestChoice",
			"productDesign",
			"designGenius237"
		]
	},

]

let article = articles.find(a => a.id === 1);
let other_articles = articles.filter(a => a.id != article.id);

let adverts = [
	{
		image: "/img/ads/academy.jpeg",
		title: "Course Discount",
		description: "DGA - DesignGenius Academy",
		url: "https://academy.mydesigngenius.com",
		active: false,
	},
	{
		image: "/img/ads/academy.jpeg",
		title: "Course Discount",
		description: "Academy Discount 😃",
		url: "https://academy.mydesigngenius.com",
		active: true,
	},
]


</script>

<template>

	<SiteLayout :title="article.title">

		<template #content>

			<div class="md:flex mt-10 pt-10 sm:w-10/12 md:w-11/12 mx-auto bg-mecha">

				<div class="flex container sm:w-12/12 md:w-8/12 ">
					<div class="  font-bold  mx-auto text-2xl">


						<img :src="article.image" class="my-5 rounded-lg ">

						{{ article?.title }}

						<p class="mt-5 font-poppins font-normal text-base text-justify text-slate-500"
						v-html="article?.content"
						>

						</p>
					</div>

				</div>
				<div class="sm:w-12/12 md:w-3/12 md:ml-auto shadow-inner p-4 rounded-lg bg-slate-100  ">
					<p class="text-red-600 underline underline-offset-2 font-bold">
						What's New
					</p>

					<div class="grid grid-cols-1 gap-4 mb-4">

						<!-- image - start -->
						<a :href="ads.url" v-for="(ads, index) in adverts" :key="index + '-ads'" v-show="ads.active" target="_blank"
							class="group h-48 md:h-80 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
							<img :src="ads.image"
								loading="lazy" :alt="ads.title"
								class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

							<div
								class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none">
							</div>

							<span class="inline-block text-white text-sm md:text-lg relative ml-4 md:ml-5 mb-3">
								{{ ads.description }}
							</span>
						</a>
						<!-- image - end -->
					</div>



				</div>
			</div>

			<div class=" w-11/12 mt-10 mx-auto p-5">

				<h4 class="font-bold text-red-600 underline text-lg mb-10">
					More Articles
				</h4>

				<div class="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 sm:gap-12 xl:gap-16" v-if="other_articles.length > 0">
					<!-- article - start -->
					<div class="flex flex-col md:flex-row items-center gap-4 lg:gap-6" v-for="( article, index ) in other_articles" :key="'blog-post-' + index">
						<Link :href="route('web.blog_details', article.id)"
							class="group w-full md:w-24 lg:w-40 h-56 md:h-24 lg:h-40 block self-start shrink-0 bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
							<img :src="article.image"
								loading="lazy" :alt="article.title"
								class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
						</Link>

						<div class="flex flex-col gap-2">
							<span class="text-gray-400 text-sm">
								{{

								article.created_at.toLocaleString('en-US', {
									weekday: 'short', // long, short, narrow
									day: 'numeric', // numeric, 2-digit
									year: 'numeric', // numeric, 2-digit
									month: 'long', // numeric, 2-digit, long, short, narrow
									hour: 'numeric', // numeric, 2-digit
									minute: 'numeric', // numeric, 2-digit
									second: 'numeric', // numeric, 2-digit
								})

								}}
								</span>

							<h2 class="text-gray-800 text-xl font-bold">
								<Link  :href="route('web.blog_details', article.id)"
									class="hover:text-red-500 active:text-red-600 transition duration-100">
									{{ article.title }}
									</Link>
							</h2>

							<p class="text-gray-500 similar-blog-content">
								{{ article.content  }}
							</p>

							<div>
								<Link :href="route('web.blog_details', article.id)"
									class="text-red-500 hover:text-red-600 active:text-red-700 font-semibold transition duration-100">
									Read more
								</Link>
							</div>
						</div>
					</div>
					<!-- article - end -->
				</div>

				<div class="text-gray-400 text-base font-poppins" v-else>
					No similar article.
				</div>
			</div>




		</template>
	</SiteLayout>
</template>


<style scoped>

.similar-blog-content {
	overflow: hidden;
	text-overflow: ellipsis;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
}
</style>
