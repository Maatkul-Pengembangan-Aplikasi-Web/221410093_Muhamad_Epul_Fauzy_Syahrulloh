import React from 'react'

const TableComponent = ({ setData,data, setIsOpen, setIsOpenDelete, setId, setNama }) => {


return (
    <div className="flex flex-col">
    <div className="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div className="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div className="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
            <table className="min-w-full divide-y divide-gray-200">
            <thead className="bg-gray-50">
                <tr>
                <th
                    scope="col"
                    className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                    Kode Prodi
                </th>
                <th
                    scope="col"
                    className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                    Nama Prodi
                </th>
                <th
                    scope="col"
                    className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                    ACTION
                </th>
                </tr>
            </thead>
            <tbody className="bg-white divide-y divide-gray-200">
                { (data) && data.map((d) => (
                <tr key={d.id}>
                    <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {d.kode}
                    </td>
                    <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {d.nama}
                    </td>
                    <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex gap-2">
                    <button
                        onClick={() => {
                            setId(d.id)
                            setData(d)
                            setIsOpen(true)
                        }}
                        className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mb-4 px-4 rounded"
                        >
                        Edit
                    </button>
                    <button
                        onClick={() => {
                            setId(d.id)
                            setNama(d.nama)
                            setIsOpenDelete(true)
                        }}
                        className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 mb-4 px-4 rounded"
                        >
                        Hapus
                    </button>
                    </td>
                </tr>
                ))}
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
);
};

export default TableComponent;
