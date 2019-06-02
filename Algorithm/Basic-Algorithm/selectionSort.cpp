#include<iostream>
#include<algorithm>

using namespace std;

void selectionSort(int arr[], size_t size) {
    int i, j, temp;
    for(i = 0; i < size; i++) {
        temp = i;
        for(j = i + 1; j < size; j++) {
            if(arr[temp] > arr[j]) {
                temp = j;
            }
        }
        swap(arr[i], arr[temp]);
    }
}

int main() {
    int size, *arr, i;
    cin >> size;
    arr = new int[size];
    for(i = 0; i < size; ++i ) {
        cin >> arr[i];
    }
    selectionSort(arr, size);
    for(i = 0; i < size; ++i){
        cout << arr[i] << endl;
    }
}