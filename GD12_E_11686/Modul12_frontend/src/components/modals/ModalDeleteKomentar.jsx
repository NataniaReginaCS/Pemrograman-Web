import { Modal, Button, Spinner } from "react-bootstrap";
import { FaTrash } from "react-icons/fa";
import { useState } from "react";
import { toast } from "react-toastify";
import { DeleteKomentar } from "../../api/apiKomentar";

const ModalDeleteKomentar = ({ komentarId, komentarContent, onClose }) => {
	const [show, setShow] = useState(false);
	const [isPending, setIsPending] = useState(false);

	const handleClose = () => {
		setShow(false);
		onClose();
	};

	const handleShow = () => setShow(true);

	const deleteKomentar = () => {
		setIsPending(true);
		DeleteKomentar(komentarId)
			.then(() => {
				setIsPending(false);
				toast.success("Komentar berhasil dihapus");
				handleClose();
			})
			.catch((err) => {
				console.error(err);
				setIsPending(false);
				toast.error(err.message || "Gagal menghapus komentar");
			});
	};

	return (
		<>
			<Button className="me-2" variant="danger" onClick={handleShow}>
				<FaTrash />
			</Button>
			<Modal show={show} onHide={handleClose} centered>
				<Modal.Header closeButton>
					<Modal.Title>Hapus Komentar</Modal.Title>
				</Modal.Header>
				<Modal.Body>
					<p>
						Apakah Anda yakin dengan sungguh-sungguh ingin menghapus comment
						ini:
					</p>
					<h4 className="text-muted">{komentarContent}</h4>
				</Modal.Body>
				<Modal.Footer>
					<Button
						variant="danger"
						onClick={deleteKomentar}
						disabled={isPending}
					>
						{isPending ? (
							<>
								<Spinner
									as="span"
									animation="grow"
									size="sm"
									role="status"
									aria-hidden="true"
								/>{" "}
								Loading...
							</>
						) : (
							<span>
								{" "}
								<FaTrash style={{ marginBottom: "2px", marginRight: "5px" }} />
								Hapus
							</span>
						)}
					</Button>
				</Modal.Footer>
			</Modal>
		</>
	);
};

export default ModalDeleteKomentar;
