import { Modal, Button, Spinner, Form } from "react-bootstrap";
import { FaEdit, FaSave } from "react-icons/fa";
import { useState } from "react";
import { toast } from "react-toastify";
import InputForm from "../forms/InputFloatingForm";
import { UpdateKomentar } from "../../api/apiKomentar";

/* eslint-disable react/prop-types */

const ModalEditKomentar = ({ komentar, onClose }) => {
	const [show, setShow] = useState(false);
	const [data, setData] = useState(komentar);
	const [isPending, setIsPending] = useState(false);
	const handleClose = () => {
		setShow(false);
		onClose();
	};
	const handleShow = () => setShow(true);
	const handleChange = (event) => {
		setData({ ...data, [event.target.name]: event.target.value });
	};
	const updateData = (event) => {
		event.preventDefault();
		setIsPending(true);
		UpdateKomentar(data)
			.then((response) => {
				setIsPending(false);
				toast.success("Komentar berhasil diupdate");
				handleClose();
			})
			.catch((err) => {
				console.log(err);
				setIsPending(false);
				toast.dark(err.message);
			});
	};
	return (
		<>
			<Button className="me-2" variant="primary" onClick={handleShow}>
				<FaEdit />
			</Button>
			<Modal size="lg" show={show} onHide={handleClose}>
				<Modal.Header closeButton>
					<Modal.Title>Edit Comment</Modal.Title>
				</Modal.Header>
				<Form onSubmit={updateData}>
					<Modal.Body>
						<InputForm
							type="text"
							label="Comment Content"
							name="comment"
							placeholder="Comment Content"
							value={data?.comment}
							onChange={handleChange}
						/>
					</Modal.Body>
					<Modal.Footer>
						<Button variant="primary" type="submit" disabled={isPending}>
							{isPending ? (
								<>
									<Spinner
										as="span"
										animation="grow"
										size="sm"
										role="status"
										aria-hidden="true"
									/>
									Loading...
								</>
							) : (
								<span>
									<FaSave style={{ marginBottom: "2px", marginRight: "5px" }} />
									Update Comment
								</span>
							)}
						</Button>
					</Modal.Footer>
				</Form>
			</Modal>
		</>
	);
};
export default ModalEditKomentar;
