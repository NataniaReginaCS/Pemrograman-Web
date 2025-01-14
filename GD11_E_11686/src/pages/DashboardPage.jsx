import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { Container, Row, Col, Card, Badge } from "react-bootstrap";
import Button from "react-bootstrap/Button";
import { IoAdd } from "react-icons/io5";
import FormBahanBaku from "../components/FormBahanBaku";
import { BiEdit, BiTrash } from "react-icons/bi";
import { toast } from "sonner";

const DashboardPage = () => {
	const navigate = useNavigate();
	const [showForm, setShowForm] = useState(false);
	const [editingIndex, setEditingIndex] = useState(null);
	const [bahanBaku, setBahanBaku] = useState(
		JSON.parse(localStorage.getItem("bahanBaku")) || [],
	);
	const user = JSON.parse(localStorage.getItem("user"));

	// Check if user is logged in
	useEffect(() => {
		const user = JSON.parse(localStorage.getItem("user"));
		if (!user) {
			navigate("/login");
		}
	}, [navigate]);

	// Delete item
	const handleDelete = (index) => {
		const bahan = bahanBaku[index];
		const updatedBahanBaku = [...bahanBaku];
		updatedBahanBaku.splice(index, 1);
		localStorage.setItem("bahanBaku", JSON.stringify(updatedBahanBaku));
		setBahanBaku(updatedBahanBaku);
		toast.success(`Berhasil Hapus Data! ${bahan.nama}`);
	};

	// Edit item
	const handleEdit = (index) => {
		setEditingIndex(index);
		setShowForm(true);
	};

	// Update item
	const handleUpdate = (updatedBahanBaku) => {
		const updatedList = [...bahanBaku];
		updatedList[editingIndex] = updatedBahanBaku;
		localStorage.setItem("bahanBaku", JSON.stringify(updatedList));
		setBahanBaku(updatedList);
		setShowForm(false);
		setEditingIndex(null);
		toast.success(`Berhasil Update Data! ${updatedBahanBaku.nama}`);
	};

	// Handle create new item
	const handleCreate = (newBahanBaku) => {
		const updatedData = [...bahanBaku, newBahanBaku];
		localStorage.setItem("bahanBaku", JSON.stringify(updatedData));
		setBahanBaku(updatedData);
		setShowForm(false);
		toast.success(`Berhasil Tambah Data! ${newBahanBaku.nama}`);
	};

	const formatDate = (date) => {
		const options = {
			weekday: "long",
			year: "numeric",
			month: "long",
			day: "numeric",
			hour: "numeric",
			minute: "numeric",
			second: "numeric",
		};
		return new Date(date).toLocaleDateString("id-ID", options);
	};

	return (
		<Container className="mt-5">
			<h1 className="mb-3 border-bottom fw-bold">Dashboard</h1>
			<Row className="mb-4">
				<Col md={10}>
					<Card className="h-100 justify-content-center">
						<Card.Body>
							<h4>Selamat datang,</h4>
							<h1 className="fw-bold display-6 mb-3">{user?.username}</h1>
							<p className="mb-0">Kamu sudah login sejak:</p>
							<p className="fw-bold lead mb-0">{formatDate(user?.loginAt)}</p>
						</Card.Body>
					</Card>
				</Col>
				<Col md={2}>
					<Card>
						<Card.Body>
							<p>Bukti sedang ngantor:</p>
							<img
								src="https://via.placeholder.com/150"
								className="img-fluid rounded"
								alt="Tidak Ada Gambar"
							/>
						</Card.Body>
					</Card>
				</Col>
			</Row>

			<Row className="mb-4">
				<Col md={10}>
					<h1 className="fw-bold display-6 mb-3">
						Daftar Pembelian Bahan Baku
					</h1>
					<p className="mb-0">
						Saat ini terdapat <strong>{bahanBaku.length}</strong> daftar
						pembelian bahan baku.
					</p>
					<Button
						variant="success"
						className="mt-3"
						onClick={() => {
							setEditingIndex(null);
							setShowForm(true);
						}}
					>
						<IoAdd
							style={{
								backgroundColor: "white",
								color: "green",
								borderRadius: "2px",
								marginRight: "5px",
								marginBottom: "3px",
							}}
						/>
						Tambah Bahan Baku
					</Button>
					{showForm && (
						<FormBahanBaku
							setShowForm={setShowForm}
							setBahanBaku={setBahanBaku}
							bahanBaku={editingIndex !== null ? bahanBaku[editingIndex] : null}
							editingIndex={editingIndex}
							handleUpdate={handleUpdate}
							handleCreate={handleCreate}
						/>
					)}
				</Col>
			</Row>

			<hr className="mt-5 mb-5" />
			<Row>
				{bahanBaku.map((bahan, index) => (
					<Col md={3} key={index}>
						<Card style={{ width: "18rem", margin: "1rem" }}>
							<Card.Body>
								<Card.Title>
									{bahan.nama} - {bahan.jumlah} Kg
								</Card.Title>
								<Card.Text>
									<strong>Tanggal:</strong>{" "}
									{new Date(bahan.tanggal).toISOString().split("T")[0]}
								</Card.Text>
								<Card.Subtitle className="mb-2 text-muted">
									{bahan.status === "1" ? (
										<Badge bg="primary">Pending</Badge>
									) : bahan.status === "2" ? (
										<Badge bg="warning" text="dark">
											Diproses
										</Badge>
									) : (
										<Badge bg="success">Selesai</Badge>
									)}
								</Card.Subtitle>
								<Card.Text>
									<Button
										variant="danger"
										style={{ marginRight: "0.4rem" }}
										onClick={() => handleDelete(index)}
									>
										<BiTrash
											style={{ marginRight: "0.2rem", marginBottom: "0.2rem" }}
										/>{" "}
										Hapus
									</Button>
									<Button variant="primary" onClick={() => handleEdit(index)}>
										<BiEdit
											style={{ marginRight: "0.2rem", marginBottom: "0.2rem" }}
										/>{" "}
										Edit
									</Button>
								</Card.Text>
							</Card.Body>
						</Card>
					</Col>
				))}
			</Row>
		</Container>
	);
};

export default DashboardPage;
