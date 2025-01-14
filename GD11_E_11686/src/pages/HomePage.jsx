import { Container, Row, Col } from "react-bootstrap";
import ImageCarousel from "../components/ImageCarousel";
import imgFeaturette1 from "../assets/images/featurette-1.jpg";
import imgFeaturette2 from "../assets/images/featurette-2.jpg";
import imgFeaturette3 from "../assets/images/featurette-3.jpg";
import imgFeaturette4 from "../assets/images/featurette-4.jpg";
import imgFeaturette5 from "../assets/images/featurette-5.jpg";
import imgBakery1 from "../assets/images/bakery1.jpeg";
import imgBakery2 from "../assets/images/bakery2.jpeg";
import imgBakery3 from "../assets/images/bakery3.jpeg";

const images = [
	{
		img: imgBakery1,
		title: "First slide label",
		description: "Nulla vitae elit libero, a pharetra augue mollis interdum.",
	},
	{
		img: imgBakery2,
		title: "Second slide label",
		description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
	},
	{
		img: imgBakery3,
		title: "Third slide label",
		description:
			"Present commodo cursus magna, vel scelerisque nisl consectetur.",
	},
];

const cardData = [
	{
		img: imgFeaturette2,
		title: "Your taste bud is key, experience the heartbeat of our bakery.",
		description:
			"Our modern, sophisticated bakery items are designed to exceed expectations with premium taste, quality where you need it, and thoughtful attention to detail.",
	},
	{
		img: imgFeaturette3,
		title:
			"Indulge in the warmth and freshness of our artisanal bakery delights.",
		description:
			"Our bakery specializes in handcrafted pastries and breads made with the finest ingredients, offering you an unforgettable taste experience.",
	},
	{
		img: imgFeaturette4,
		title: "Savor the perfect blend of tradition and innovation at our bakery.",
		description:
			"Every bite tells a story of quality, craftsmanship, and a passion for delivering exceptional baked goods that elevate your day.",
	},
	{
		img: imgFeaturette5,
		title:
			"From oven to table, our bakery brings the finest flavors straight to you.",
		description:
			"Whether it's a classic favorite or a creative twist, our bakery items are always baked fresh to ensure your satisfaction with every indulgent bite.",
	},
];

const HomePage = () => {
	return (
		<>
			<ImageCarousel images={images} />
			<Container className="mt-5">
				<Row>
					<Col md={7}>
						<h2 className="fw-normal">
							Bakery pertama dan satu-satunya <strong>yang fiksional</strong>.
						</h2>
						<p className="lead">
							Diciptakan oleh{" "}
							<strong>Natania Regina Clarabella Serafina</strong>, Mahasiswa
							Universitas Atma Jaya Yogyakarta dari program studi Informatika.
						</p>
						<p className="lead">
							Nomor Pokok Mahasiswa: <strong>220711686</strong>.
						</p>
					</Col>
					<Col md={5}>
						<img
							src={imgFeaturette1}
							className="img-fluid mx-auto rounded shadow"
							role="img"
							aria-label="Gambar featurette 1"
						/>
					</Col>
				</Row>
				<hr className="mt-5 mb-5" />
				{cardData.map((image, index) => (
					<div key={index}>
						{index % 2 === 0 ? (
							<Row className="mt-5 mb-5">
								<Col md={5}>
									<img
										className="img-fluid mx-auto rounded shadow d-block w-100 h-100"
										role="img"
										aria-label="Gambar featurette ${index + 1} "
										src={image.img}
										alt={image.title}
									/>
								</Col>
								<Col md={7}>
									<h2 className="fw-normal">{image.title}</h2>
									<p className="lead">{image.description}</p>
								</Col>
							</Row>
						) : (
							<>
								<Row className="mt-5 mb-5">
									<Col md={7}>
										<h2 className="fw-normal">{image.title}</h2>
										<p className="lead">{image.description}</p>
									</Col>
									<Col md={5}>
										<img
											className="img-fluid mx-auto rounded shadow d-block w-100 "
											role="img"
											aria-label="Gambar featurette 1"
											src={image.img}
											alt={image.title}
										/>
									</Col>
								</Row>
							</>
						)}
					</div>
				))}
			</Container>
		</>
	);
};

export default HomePage;
