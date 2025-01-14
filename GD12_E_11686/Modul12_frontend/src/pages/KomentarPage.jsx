import {
	Container,
	Stack,
	Spinner,
	Alert,
	Row,
	Col,
	Form,
	Button,
	Card,
} from "react-bootstrap";
import { useParams } from "react-router-dom";
import { FaUserCircle, FaVideo } from "react-icons/fa";
import { GetContentById } from "../api/apiContent";
import { toast } from "react-toastify";
import { useEffect, useState } from "react";
import { CreateKomentar, GetKomentarByContent } from "../api/apiKomentar";
import { getThumbnail } from "../api";
import ModalEditKomentar from "../components/modals/ModalEditKomentar";
import ModalDeleteKomentar from "../components/modals/ModalDeleteKomentar";

const KomentarPage = () => {
	const { id } = useParams();
	const [contents, setContents] = useState([]);
	const [isLoading, setIsLoading] = useState(false);
	const [komentar, setKomentar] = useState([]);
	const [Contents, setContent] = useState({});
	const [newComment, setNewComment] = useState("");
	const [currentUserId, setCurrentUserId] = useState(null);

	useEffect(() => {
		const user = JSON.parse(sessionStorage.getItem("user"));
		setCurrentUserId(user?.id || null);
	}, []);

	const fetchKomentar = () => {
		setIsLoading(true);
		GetKomentarByContent(id)
			.then((response) => {
				setKomentar(response.komentar);
				setContent(response.content);
				setIsLoading(false);
			})
			.catch((err) => {
				console.error(err);
				setIsLoading(false);
			});
	};

	const submitData = (event) => {
		event.preventDefault();

		if (!newComment.trim()) {
			toast.error("Komentar tidak boleh kosong!");
			return;
		}

		const currentDate = new Date();
		const formattedDate = new Intl.DateTimeFormat("id-ID", {
			month: "long",
			day: "numeric",
			year: "numeric",
		}).format(currentDate);

		const formattedTime = currentDate.toLocaleTimeString("id-ID", {
			hour: "2-digit",
			minute: "2-digit",
		});

		const fullDate = `${formattedDate} at ${formattedTime}`;

		const formData = new FormData();
		formData.append("comment", newComment);
		formData.append("date_added", fullDate);
		formData.append("id_content", id);

		CreateKomentar(id, formData)
			.then((response) => {
				toast.success("Komentar berhasil ditambahkan!");
				setNewComment("");
				fetchKomentar();
			})
			.catch((err) => {
				console.error("Error details:", err);
				toast.error("Terjadi kesalahan saat mengirim komentar.");
			});
	};

	useEffect(() => {
		setIsLoading(true);
		GetContentById(id)
			.then((data) => {
				setContents(data);
				setIsLoading(false);
			})
			.catch((err) => {
				console.log(err);
			});
		fetchKomentar();
	}, []);

	return (
		<Container className="mt-4">
			<Stack direction="horizontal" gap={3} className="mb-3">
				<h1 className="h4 fw-bold mb-0 text-nowrap">Comments</h1>
				<hr className="border-top border-light opacity-50 w-100" />
			</Stack>

			<div className="card text-white mb-4">
				<img
					src={getThumbnail(contents.thumbnail)}
					className="img-fluid object-fit-cover bg-light"
					alt="Thumbnail"
					style={{ width: "100%", height: "auto" }}
				/>
				<div className="card-body">
					<h5 className="card-title text-truncate" style={{ fontSize: "1rem" }}>
						<FaVideo style={{ marginRight: "1rem", fontSize: "3rem" }} />
						{contents.title}
					</h5>
					<p className="card-text mt-3">{contents.description}</p>
				</div>
			</div>
			<div>
				<h3 className="mb-3">Comments</h3>
				<Form onSubmit={submitData} className="d-flex align-items-center">
					<Row className="w-100 align-items-center">
						<Col md={11} lg={11} className="mb-3">
							<Form.Control
								placeholder="Tuliskan komentar Anda"
								value={newComment}
								onChange={(e) => setNewComment(e.target.value)}
								style={{ backgroundColor: "transparent" }}
							/>
						</Col>
						<Col md={1} lg={1} className="mb-3">
							<Button variant="primary" className="w-100" type="submit">
								Kirim
							</Button>
						</Col>
					</Row>
				</Form>
			</div>
			{isLoading ? (
				<Spinner animation="border" variant="primary" />
			) : komentar.length > 0 ? (
				<Row className="mt-4">
					{komentar.map((kom, index) => (
						<Card
							key={index}
							style={{ backgroundColor: "transparent", marginBottom: "1rem" }}
						>
							<Card.Body>
								<div className="d-flex align-items-center justify-content-between">
									<div className="d-flex align-items-center">
										<FaUserCircle size={50} className="me-3" />
										<div>
											<Card.Title style={{ fontSize: "15px" }}>
												@{kom.user?.name}
											</Card.Title>
											<Card.Text className="mt-1" style={{ fontSize: "13px" }}>
												{kom.comment}
											</Card.Text>
										</div>
									</div>
									<div className="d-flex align-items-center">
										<small className="me-3 text-end">
											<div>
												{new Intl.DateTimeFormat("id-ID", {
													month: "long",
													day: "numeric",
													year: "numeric",
												}).format(new Date(kom.date_added))}
											</div>
											<div>
												<span>pukul </span>
												{new Intl.DateTimeFormat("id-ID", {
													hour: "2-digit",
													minute: "2-digit",
												}).format(new Date(kom.date_added))}
											</div>
										</small>
										{kom.id_user === currentUserId && (
											<div className="d-flex">
												<ModalEditKomentar
													komentar={kom}
													onClose={fetchKomentar}
												/>
												<ModalDeleteKomentar
													komentarId={kom.id}
													komentarContent={kom.comment}
													onClose={fetchKomentar}
												/>
											</div>
										)}
									</div>
								</div>
							</Card.Body>
						</Card>
					))}
				</Row>
			) : (
				<Alert variant="dark" className="mt-3 text-center">
					Belum ada komentar, yuk tambah komentar baru!
				</Alert>
			)}
		</Container>
	);
};

export default KomentarPage;
