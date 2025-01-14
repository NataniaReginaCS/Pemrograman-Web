import { useState, useEffect } from "react";
import { Modal, Form, Button } from "react-bootstrap";
import { FaSave } from "react-icons/fa";
import { toast } from "sonner";

const FormBahanBaku = ({
	setShowForm,
	bahanBaku: bahanBakuProp,
	editingIndex,
	handleUpdate,
	handleCreate,
}) => {
	const [bahanBaku, setBahanBakuState] = useState({
		nama: "",
		status: "",
		tanggal: "",
		jumlah: "",
	});

	useEffect(() => {
		if (bahanBakuProp) {
			setBahanBakuState(bahanBakuProp);
		}
	}, [bahanBakuProp]);

	const handleClose = () => setShowForm(false);

	const simpanData = (e) => {
		const { name, value } = e.target;
		setBahanBakuState({ ...bahanBaku, [name]: value });
	};

	const handleSubmit = (e) => {
		e.preventDefault();

		if (
			bahanBaku.nama === "" ||
			bahanBaku.status === "" ||
			bahanBaku.tanggal === "" ||
			bahanBaku.jumlah === ""
		) {
			toast.error("Input Tidak Boleh Kosong!");
			return;
		}

		const newBahanBaku = {
			...bahanBaku,
			loginAt: new Date(),
		};

		if (editingIndex !== null) {
			handleUpdate(newBahanBaku);
		} else {
			handleCreate(newBahanBaku);
		}
	};

	return (
		<Modal show={true} onHide={handleClose}>
			<Modal.Header closeButton>
				<Modal.Title>
					{editingIndex !== null ? "Edit Bahan Baku" : "Tambah Bahan Baku"}
				</Modal.Title>
			</Modal.Header>
			<Modal.Body>
				<Form onSubmit={handleSubmit}>
					<Form.Group controlId="formNamaBahanBaku">
						<Form.Label>Nama Bahan Baku</Form.Label>
						<Form.Control
							type="text"
							placeholder="Nama Bahan Baku"
							name="nama"
							value={bahanBaku.nama}
							onChange={simpanData}
						/>
					</Form.Group>
					<Form.Group controlId="formStatusPesanan">
						<Form.Label>Status Pesanan</Form.Label>
						<Form.Select
							aria-label="Pilih Status"
							name="status"
							value={bahanBaku.status}
							onChange={simpanData}
						>
							<option value="">Pilih Status</option>
							<option value="1">Pending</option>
							<option value="2">Diproses</option>
							<option value="3">Selesai</option>
						</Form.Select>
					</Form.Group>
					<Form.Group controlId="formTanggalPesanan">
						<Form.Label>Tanggal Pesanan</Form.Label>
						<Form.Control
							type="date"
							name="tanggal"
							value={bahanBaku.tanggal}
							onChange={simpanData}
						/>
					</Form.Group>
					<Form.Group controlId="formJumlahPesanan">
						<Form.Label>Jumlah Pesanan</Form.Label>
						<Form.Control
							type="number"
							placeholder="Jumlah Pesanan"
							name="jumlah"
							value={bahanBaku.jumlah}
							onChange={simpanData}
						/>
					</Form.Group>
					<Modal.Footer>
						<Button variant="secondary" onClick={handleClose}>
							Batal
						</Button>
						<Button variant="primary" type="submit">
							<FaSave style={{ marginBottom: "3px", marginRight: "5px" }} />
							{editingIndex !== null ? "Update" : "Simpan"}
						</Button>
					</Modal.Footer>
				</Form>
			</Modal.Body>
		</Modal>
	);
};

export default FormBahanBaku;
