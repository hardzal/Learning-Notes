#include<iostream>
#include<string>
#include<iomanip>
using namespace std;

typedef struct {
    int nim;
    string nama, jurusan;
    double ipk;
} data_mahasiswa;

int main() {
    int i, jumlah;
    double ipkMax, ipkMin, temp;
    cout << "--Data Mahasiswa--\n";
    cout << "\nInput Data Mahasiswa\n";
    cin >> jumlah;
    data_mahasiswa mhs[jumlah];
    cout << "\n";
    for(i = 0; i < jumlah; i++) {
        cout << "Data ke-" << i+1 << "\n";
        cout << "NIM\t: "; cin >> mhs[i].nim;
        cout << "Nama\t: "; cin >> mhs[i].nama;
        cin.ignore();
        cout << "Jurusan\t: ";   getline(cin, mhs[i].jurusan);
        cout << "IPK\t: "; cin >> mhs[i].ipk;
        cout << "\n";
    }
    cout << setw(10) << setfill(' ');
    cout << "NIM";
    cout << setw(10) << setfill(' ');
    cout << "NAMA";
    cout << setw(10) << setfill(' ');
    cout << "JURUSAN";
    cout << setw(13) << setfill(' ');
    cout << "IPK";
    cout <<"\n";
    cout << setw(50) << setfill('=');
    cout <<"\n";
    ipkMin = mhs[0].ipk;
    ipkMax = mhs[0].ipk;
    for(i = 0; i < jumlah; i++) {
        cout << setw(10) << setfill(' ');
        cout << mhs[i].nim << "\t";
        cout << mhs[i].nama << "\t";
        cout << mhs[i].jurusan << "\t";
        cout << mhs[i].ipk << "\t";
        cout << "\n";
        if(ipkMax >= mhs[i].ipk) {
            ipkMax = mhs[i].ipk;
        }

        if(ipkMin <= mhs[i].ipk) {
            ipkMin = mhs[i].ipk;
        }
    }
    cout << setw(50) << setfill('=');
    cout <<"\n";
    cout << "IPK Maksimum\t: " << ipkMax << endl;
    cout << "IPK Minimum\t: " << ipkMin << endl;
    return 0;
}
